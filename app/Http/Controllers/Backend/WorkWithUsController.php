<?php

namespace App\Http\Controllers\Backend;

use Request;
use Session;
use App\WorkWithUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkWithUsRequest;

class WorkWithUsController extends Controller
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
     * @param  \App\WorkWithUs  $workWithUs
     * @return \Illuminate\Http\Response
     */
    public function show(WorkWithUs $workWithUs)
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

        $work_with_us = WorkWithUs::findOrFail($id);

        return view('backend.work_with_us.edit')
            ->with('work_with_us', $work_with_us);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  WorkWithUs  $request
     * @param  int  $id
     * @return Response
     */
    public function update(WorkWithUsRequest $request, $id)
    {
        $this->authorize('admin');

        $work_with_us = WorkWithUs::findOrFail($id);
        $work_with_us->update($request->all());

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editado');

        return redirect()
            ->action('Backend\WorkWithUsController@edit', 1)
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkWithUs  $workWithUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkWithUs $workWithUs)
    {
        //
    }
}
