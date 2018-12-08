<?php

namespace App\Http\Controllers\Backend;

use Request;
use Session;
use App\Social;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('admin');

        $social = Social::findOrFail($id);

        return view('backend.socials.edit')
            ->with('social', $social);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Social  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SocialRequest $request, $id)
    {
        $this->authorize('admin');

        $social = Social::findOrFail($id);
        $social->update($request->all());

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editado');

        return redirect()
            ->action('Backend\SocialController@edit', 1)
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        //
    }
}
