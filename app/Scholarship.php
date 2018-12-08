<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Scholarship extends Model
{
    protected $table = 'scholarships';
    protected $guarded = ['id'];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function type_of_training()
    {
        return $this->belongsTo(TypeOfTraining::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function calculoValor()
    {
        if ($this->evolucao_preco and $this->parcelas) {
            $mensalidade = (($this->mensalidade * 12) / $this->parcelas);
            return round(($mensalidade - ($mensalidade / 100) * $this->desconto), 2);
        } else {
            return round(($this->mensalidade - ($this->mensalidade / 100) * $this->desconto), 2);
        }
    }

    public function bolsasDisponiveis()
    {
        $bolsas_compradas = DB::table('orders')
            ->join('order_bolsa_aluno', 'orders.id', '=', 'order_bolsa_aluno.order_id')
            ->where('order_bolsa_aluno.scholarship_id', '=', $this->id)
            ->where('orders.pagamento_confirmado', '=', 1)
            ->count();
        return ($this->vagas_estoque - $bolsas_compradas);
    }

    //Retorna a bolsa referente ao curso
    public static function bolsaDoCurso($curso_escolhido)
    {
        $query = DB::table('scholarships as s');

        $query->where('s.id', '=', $curso_escolhido);
        $query->whereNotNull('s.mensalidade');
        $query->whereNotNull('s.desconto');
        $query->whereNotNull('s.vagas_estoque');
        $query->whereNotNull('s.vagas_site');
        $query->whereNotNull('s.parcelas');
        $query->where('s.fora_estoque', '=', 0);
        if ($query->first()) {
            $bolsa = Scholarship::findOrFail($curso_escolhido);
            return $bolsa;
        }
        return false;
    }

    //Retorna a bolsa referente ao curso
    public static function bolsasCompradasUsuario($idAluno)
    {
        $bolsas_compradas = DB::table('orders')
            ->select(
                'orders.id as o_id',
                DB::raw("DATE_FORMAT(orders.created_at, '%d/%m/%Y') as date"),
                'order_bolsa_aluno.*'
            )
            ->where('orders.user_id', '=', $idAluno)
            ->join('order_bolsa_aluno', 'orders.id', '=', 'order_bolsa_aluno.order_id')
            ->where('orders.pagamento_confirmado', '=', 1)
            ->get();
        return $bolsas_compradas;
    }

    //Retorna a bolsa referente ao curso
    public static function bolsaDeUmPedido($order_id)
    {
        $bolsas_compradas = DB::table('orders')
             ->select(
                 'orders.id as o_id',
                 DB::raw("DATE_FORMAT(orders.created_at, '%d/%m/%Y') as date"),
                 'order_bolsa_aluno.*'
             )
             ->where('orders.id', '=', $order_id)
             ->join('order_bolsa_aluno', 'orders.id', '=', 'order_bolsa_aluno.order_id')
             ->where('orders.pagamento_confirmado', '=', 1)
             ->first();
        return $bolsas_compradas;
    }

    // public static function listaBolsasDeUmaInstituicao($id_instituicao)
    // {
    //     $bolsas = DB::table('scholarships as s')
    //     ->where('s.institution_id', $id_instituicao)
    //     ->join('shifts as shi', 'shi.id', '=', 's.shift_id')
    //     ->select('shi.name as shift_name')
    //     ->get();

    //     dd($bolsas);

    //     $categorias = DB::table('products as p')
    //     ->whereIn('p.id', $produtos->pluck('id')->toArray())
    //     ->join('category_product as c_p', 'c_p.product_id', '=', 'p.id')
    //     ->join('categories as c', 'c_p.category_id', '=', 'c.id')
    //     ->get();
    // }
}
