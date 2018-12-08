<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Shift;
use App\Product;
use App\Subcategory;
use App\Institution;
use App\Neighborhood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pageBuscaController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $turnos = Shift::all();
        $produtos = Product::all();
        $bairros = Neighborhood::orderBy('name')->get();
        $subcategorias = Subcategory::all();
        $instituicoes = Institution::all();

        $instituicao = DB::table('institutions as i')
        ->where('i.slug', '=', $slug)
        ->join('neighborhoods as n', 'n.id', '=', 'i.neighborhood_id')
        ->select('i.id', 'i.name', 'i.image', 'i.slug', 'n.name as n_name')
        ->first();

        $instituicao = Institution::findOrFail($instituicao->id);

        $query = DB::table('scholarships as s');
        $query->where('s.institution_id', $instituicao->id);
        $query->whereNotNull('s.mensalidade');
        $query->whereNotNull('s.desconto');
        $query->whereNotNull('s.vagas_estoque');
        $query->whereNotNull('s.vagas_site');
        $query->whereNotNull('s.parcelas');
        $query->where('s.fora_estoque', '=', 0);
        $bolsas = $query->paginate(20);

        return view('frontend.page-resultado-busca', compact('instituicao', 'bolsas', 'turnos', 'produtos', 'bairros', 'subcategorias', 'instituicoes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function busca(Request $request)
    {
        $request->flash();

        $turnos = Shift::all();
        $produtos = Product::all();
        $bairros = Neighborhood::orderBy('name')->get();
        $subcategorias = Subcategory::all();
        $instituicoes = Institution::all();

        if ($request->instituicao || $request->valor || $request->bairro || $request->serie || $request->turno || $request->segmento || $request->unidade) {
            $query = DB::table('scholarships as s');
            $query->select('s.*');
            $query->whereNotNull('s.valor_final');
            $query->join('institutions as i', 'i.id', '=', 's.institution_id');
            $query->whereNull('i.deleted_at');
        }
        if ($request->instituicao) {
            $query->where('s.institution_id', '=', $request->instituicao);
        }
        if ($request->unidade) {
            $query->where('i.unidade', $request->unidade);
        }
        if ($request->bairro) {
            $query->where('i.neighborhood_id', '=', $request->bairro);
            // $query->addSelect('i.id as inst_id');
        }
        if ($request->serie) {
            $query->where('s.subcategory_id', '=', $request->serie);
        }
        if ($request->segmento) {
            $query->where('s.product_id', '=', $request->segmento);
        }
        if ($request->turno) {
            $query->whereIn('s.shift_id', $request->turno);
        }
        if ($request->valor) {
            $valor = explode(';', $request->valor);
            $query->whereBetween('valor_final', [$valor[0], $valor[1]]);
        }

        $query->whereNotNull('s.mensalidade');
        $query->whereNotNull('s.desconto');
        $query->whereNotNull('s.vagas_estoque');
        $query->whereNotNull('s.vagas_site');
        $query->whereNotNull('s.parcelas');
        $query->where('s.fora_estoque', '=', 0);

        // if ($request->instituicao || $request->instituicao || $request->bairro || $request->serie || $request->turno) {
        $bolsas = $query->paginate(20);
        // }

        //Se listagem retornou false e uma instituição foi selecionada na busca
        if (!$bolsas->total() and $request->instituicao and !isset($bairros_vizinhos)) {
            $query = DB::table('scholarships as s');
            $query->select('s.*');
            $query->whereNotNull('s.valor_final');
            $query->join('institutions as i', 'i.id', '=', 's.institution_id');
            $query->whereNull('i.deleted_at');

            $instituicao = Institution::findOrFail($request->instituicao);
            $bairros_vizinhos = json_decode($instituicao->bairros_vizinhos);

            $query->whereIn('i.neighborhood_id', $bairros_vizinhos);

            $bolsas = $query->paginate(20);
        }

        return view('frontend.page-resultado-busca', compact('instituicao', 'bolsas', 'turnos', 'produtos', 'bairros', 'subcategorias', 'instituicoes'));
    }

    function fetch(Request $request)
    {

        //  $categoria = $request->get('select');
        //  $subcategoria = $request->get('value');
        //  $catSubJunto = $request->get('dependent');

        //  $data = DB::table('country_state_city')
        //    ->where($select, $value)
        //    ->groupBy($dependent)
        //    ->get();
        //  $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        //  foreach($data as $row)
        //  {
        //   $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        //  }
        //  echo $output;
        // }

        $request->flash();
        dd($request->flash());die();

        $id = $sub ;
        $query = $fk ;
        $categoria = $categoria;
    }
}
