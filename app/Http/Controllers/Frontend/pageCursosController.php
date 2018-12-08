<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Shift;
use App\Product;
use App\Subcategory;
use App\Institution;
use App\Neighborhood;
use App\Http\Controllers\Controller;

class pageCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos = Shift::all();
        $produtos = Product::all();
        $bairros = Neighborhood::orderBy('name')->get();
        $subcategorias = Subcategory::all();
        $instituicoes = Institution::all();

        $query = DB::table('scholarships as s');
        $query->select('s.*');
        $query->whereNotNull('s.valor_final');
        $query->join('institutions as i', 'i.id', '=', 's.institution_id');
        $query->whereNull('i.deleted_at');

        //Faz a junção das bolsas com as categorias referentes aos cursos profissionalizantes
        $query->join('category_subcategory as c_s', 'c_s.subcategory_id', '=', 's.subcategory_id');
        $query->whereIn('c_s.category_id', [5, 6, 7]);

        //Evita que alguma bolsa que tenha alguma coisa fundamental incompleta seja listada
        $query->whereNotNull('s.mensalidade');
        $query->whereNotNull('s.desconto');
        $query->whereNotNull('s.vagas_estoque');
        $query->whereNotNull('s.vagas_site');
        $query->whereNotNull('s.parcelas');
        $query->where('s.fora_estoque', '=', 0);

        $bolsas = $query->paginate(20);

        return view('frontend.page-cursos', compact('instituicao', 'bolsas', 'turnos', 'produtos', 'bairros', 'subcategorias', 'instituicoes'));
    }
}
