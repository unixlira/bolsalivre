<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class pageClubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.clube');
    }
}
