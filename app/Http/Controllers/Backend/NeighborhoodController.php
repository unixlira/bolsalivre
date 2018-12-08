<?php

namespace App\Http\Controllers\Backend;

use Session;
use Request;
use App\City;
use App\Neighborhood;
use App\Http\Controllers\Controller;
use App\Http\Requests\NeighborhoodRequest;

class NeighborhoodController extends Controller
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
        $this->authorize('admin');

        $neighborhoods = Neighborhood::all();

        return view('backend.neighborhoods.index', compact('neighborhoods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');

        $cities = City::all();
        return view('backend.neighborhoods.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NeighborhoodRequest $request)
    {
        $this->authorize('admin');

        $neighborhood = new Neighborhood;
        Neighborhood::create($request->all());

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criada');

        return redirect()
            ->action('Backend\NeighborhoodController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function show(Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');

        $cities = City::all();
        $neighborhood = Neighborhood::findOrFail($id);

        return view('backend.neighborhoods.edit', compact('cities', 'neighborhood'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function update(NeighborhoodRequest $request, $id)
    {
        $this->authorize('admin');

        $neighborhood = Neighborhood::findOrFail($id);
        $neighborhood->update($request->all());

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editada');

        return redirect()
            ->action('Backend\NeighborhoodController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');

        $neighborhood = Neighborhood::find($id);
        $neighborhood->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletada');

        return redirect()
            ->action('Backend\NeighborhoodController@index');
    }
}
