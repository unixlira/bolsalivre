<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Category;
use App\Institution;
use App\Scholarship;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;

class singleInstituicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Pega a bolsa que foi enviada por post
        $bolsa = Scholarship::bolsaDoCurso($request->curso_escolhido);

        //adiciona no carrinho de compras
        Cart::add([
            'id' => $bolsa->id,
            'name' => 'Bolsa',
            'qty' => 1,
            'price' => $bolsa->calculoValor()
        ]);

        //redireciona para a pagina de visualização de pedidos
        return redirect()
            ->action('Frontend\PedidoController@index');
        // return view('frontend.pedido', compact('curso_escolhido', 'bolsa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($inst_slug, $cat_slug, $subcat_slug)
    {
        $query = DB::table('institutions as i');
        $query->where('i.slug', '=', $inst_slug);
        $query->whereNull('i.deleted_at');
        $query->join('neighborhoods as n', 'n.id', '=', 'i.neighborhood_id');
        $query->select('i.id', 'i.name', 'i.image', 'i.slug', 'n.name as n_name');
        $instituicao = $query->first();

        $categoria = DB::table('categories')
        ->where('slug', $cat_slug)
        ->first();

        $produto = Category::produtoDeUmaCategoria($categoria->id);
        $instituicao = Institution::findOrFail($instituicao->id);

        $subcategoria = DB::table('subcategories')
        ->where('slug', $subcat_slug)
        ->first();

        $query = DB::table('scholarships as s');
        // $bolsas = DB::table('scholarships as s')
        $query->where('s.institution_id', $instituicao->id);
        $query->where('s.subcategory_id', $subcategoria->id);
        $query->whereNotNull('s.mensalidade');
        $query->whereNotNull('s.desconto');
        $query->whereNotNull('s.vagas_estoque');
        $query->whereNotNull('s.vagas_site');
        $query->whereNotNull('s.parcelas');
        $query->where('s.fora_estoque', '=', 0);
        $bolsas = $query->get();

        return view('frontend.single_instituicao', compact('instituicao', 'bolsas', 'produto', 'categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
