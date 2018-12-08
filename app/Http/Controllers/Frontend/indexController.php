<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Institution;
use App\Http\Controllers\Controller;
use App\Testimony;
use App\Blog;
use App\HowItWorks;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $instituicoesDestaques = Institution::instituicoesDestaque();
        $depoimentos = Testimony::all();
        $blog = Blog::find(1);
        $how_it_works = HowItWorks::all();
        // $bolsasDestaque = Institution::listaInstituicoesDestaque();
        // return view('frontend.index', compact('bolsasDestaque'));
        return view('frontend.index', compact('instituicoesDestaques', 'depoimentos', 'blog', 'how_it_works'));
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
