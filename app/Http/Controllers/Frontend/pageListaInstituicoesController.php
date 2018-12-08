<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Http\Controllers\Controller;

class pageListaInstituicoesController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show()
    {
        $instituicoes = DB::table('institutions as i')
        ->join('neighborhoods as n', 'n.id', '=', 'i.neighborhood_id')
        ->select('i.id', 'i.name', 'i.image', 'i.slug', 'i.excerpt', 'n.name as n_name')
        ->whereNull('deleted_at')
        ->paginate(12);
        return view('frontend.page-lista-instituicoes', compact('instituicoes'));
    }
}
