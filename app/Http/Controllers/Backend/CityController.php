<?php

namespace App\Http\Controllers\Backend;

use Session;
use Request;
use App\City;
use App\State;
use App\Http\Requests\CityRequest;
use App\Http\Controllers\Controller;

class CityController extends Controller
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
        $cities = City::all();

        return view('backend.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        $states = State::all();
        return view('backend.cities.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $this->authorize('admin');

        $city = new City;
        City::create($request->all());

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criada');

        return redirect()
            ->action('Backend\CityController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');

        $states = State::all();
        $city = City::findOrFail($id);

        return view('backend.cities.edit', compact('states', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $this->authorize('admin');

        $city = City::findOrFail($id);
        $city->update($request->all());

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editada');

        return redirect()
            ->action('Backend\CityController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');

        $city = City::find($id);
        $city->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletada');

        return redirect()
            ->action('Backend\CityController@index');
    }
}
