<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class pageTermosDeUsoECondicoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.termos-de-uso-e-condicoes');
    }
}
