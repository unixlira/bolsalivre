<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\User;
use App\Order;
use DB;
use App\Subcategory;
use App\Scholarship;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Mail\EmailFinalizaPedido;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Symfony\Component\HttpFoundation\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pedido');
    }

    public function indexEtapa2()
    {
        return view('frontend.pedido-etapa-2');
    }

    public function indexEtapa3()
    {
        return view('frontend.pedido-etapa-3');
    }

    public function indexPagamento()
    {
        return view('frontend.pedido-pagamento');
    }

    public function indexPagamentoResposta()
    {
        return view('frontend.pedido-pagamento-resposta');
    }

    public function store(Request $request)
    {
        //salva o usuário e o pedido na tabela order
        $order = Order::create(['user_id' => $request->user_id]);

        //Pega a lista de bolsas enviadas, pois pode ser mais de uma
        $bolsas = Scholarship::findOrFail($request->scholarship_id);

        //Monta o array com bolsas alunos
        $bolsas_alunos = [];
        for ($i = 0; $i < count($bolsas); $i++) {
            array_push(
                $bolsas_alunos,
                [
                    'order_id' => $order['id'],
                    'scholarship_id' => $bolsas[$i]->id,
                    'institution_id' => $bolsas[$i]->institution->id,
                    'institution_name' => $bolsas[$i]->institution->name,
                    'institution_unidade' => $bolsas[$i]->institution->unidade,
                    'subcategory_id' => $bolsas[$i]->subcategory->id,
                    'subcategory_name' => $bolsas[$i]->subcategory->name,
                    'category_id' => Subcategory::categoriaDaSubcategoria($bolsas[$i]->subcategory->id)->id,
                    'category_name' => Subcategory::categoriaDaSubcategoria($bolsas[$i]->subcategory->id)->name,
                    'shift_id' => $bolsas[$i]->shift->id,
                    'shift_name' => $bolsas[$i]->shift->name,
                    'valor_bolsa' => $bolsas[$i]->calculoValor(),
                    'nome_aluno' => $request->nome_aluno[$i],
                    'endereco_aluno' => $request->endereco_aluno[$i],
                    'nome_responsavel' => $request->nome_responsavel[$i],
                    'email_responsavel' => $request->email_responsavel[$i],
                    'telefone_responsavel' => $request->telefone_responsavel[$i],
                    'cpf_responsavel' => $request->cpf_responsavel[$i]
                ]
            );
        }

        //Insere no banco
        $retorno = DB::table('order_bolsa_aluno')->insert($bolsas_alunos);

        // Se obteve sucesso na inserção
        if ($retorno) {
            //Envia para a pagina de pagamentos
            return view('frontend.pedido-etapa-3', compact('bolsas_alunos', 'order'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UserStore(UserRequest $request)
    {
        $role_id = 4;
        unset($request['role_id']);

        $user = new user;
        //$user  = User::create($request->all());
        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->attach($role_id);
    }

    public function mail($currentuser)
    {
        Mail::to($currentuser->email)->send(new EmailFinalizaPedido($currentuser));

        return 'Email was sent';
    }

    public function removeBolsaCarrinho($rowId)
    {
        Cart::remove($rowId);
        return view('frontend.pedido');
    }

    public function pagamento(Request $request)
    {
        $bolsas_alunos = DB::table('order_bolsa_aluno')
                ->select('*')
                ->where('order_id', '=', $request->order_id)
                ->get();

        //Faz a soma do valor de todas as bolsas
        $valor_total_bolsas = 0;
        foreach ($bolsas_alunos as $value) {
            $valor_total_bolsas += $value->valor_bolsa;
        }
        //Converte para centavos pois é o padrão solicitado pela cielo
        $valor_total_bolsas = $valor_total_bolsas * 100;

        $id = Auth::user()->id;
        $currentuser = User::find($id);

        $cabeçalhos = [
            'Content-Type: application/json',
            // keys de sandbox
            'MerchantId: f7488548-57d7-412c-aa31-b74dafa88d86',
            'MerchantKey: XHGFHKMXCCNEJZRVBTTSDBBVJLPMIKHLZNYPVDQQ',

            // keys de produção
            // 'MerchantId: f1275809-eb95-462d-bd68-cad42d7604ed',
            // 'MerchantKey: fXPmiiffVxly2wAKwzMudFVEmrhwVptYft3xjzcm',
            'RequestId: 1'
        ];

        $corpo = [
            'MerchantOrderId' => $request->order_id,
            'Customer' => [
                'Name' => $currentuser->name
            ],
            'Payment' => [
                'Type' => 'CreditCard',
                'Amount' => $valor_total_bolsas,
                'Installments' => 1,
                'SoftDescriptor' => $request->order_id,
                'CreditCard' => [
                    'CardNumber' => $request->cc_numero,
                    'Holder' => $request->cc_nome,
                    'ExpirationDate' => $request->cc_expiracao,
                    'SecurityCode' => $request->cc_cvv,
                    'Brand' => $request->cc_bandeira
                ]
            ]
        ];

        $ch = curl_init();

        curl_setopt_array($ch, [
            // Define o método POST:
            CURLOPT_CUSTOMREQUEST => 'POST',

            /* Uma outra opção é utilizar:
            CURLOPT_POST => true,
            */

            // Define o URL:
            // CURLOPT_URL => 'https://api.cieloecommerce.cielo.com.br/1/sales',
            //URL sandbox
            CURLOPT_URL => 'https://apisandbox.cieloecommerce.cielo.com.br/1/sales',

            // Define os cabeçalhos:
            CURLOPT_HTTPHEADER => $cabeçalhos,

            // Define corpo, em JSON:
            CURLOPT_POSTFIELDS => json_encode($corpo),

            // Habilita o retorno
            CURLOPT_RETURNTRANSFER => true
        ]);

        // Executa:
        $resposta = curl_exec($ch);

        // Encerra CURL:
        curl_close($ch);

        //Remove elementos do carrinho de compras
        Cart::destroy();

        $retorno = json_decode($resposta);

        if (isset($retorno->Payment)) {
            switch ($retorno->Payment->ReturnCode) {
                case(4):
                case(6):
                    Order::where('id', $request->order_id)
                    ->update(['pagamento_confirmado' => 1]);
                    break;
            }
        }

        $this->mail($currentuser);

        return view('frontend.pedido-pagamento-resposta', compact('retorno'));
    }
}
