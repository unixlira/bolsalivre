<?php

namespace App\Http\Controllers\Backend;

use Request;
use Session;
use App\Shift;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShiftRequest;

class ShiftController extends Controller
{
    private $shift;

    public function __construct(Shift $shift)
    {
        $this->middleware('auth');
        $this->shift = $shift;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('admin');

        $shifts = $this->shift->all();

        return view('backend.shifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin');

        return view('backend.shifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ShiftRequest $request)
    {
        $this->authorize('admin');

        $shift = new Shift;
        Shift::create($request->all());

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criado');

        return redirect()
            ->action('Backend\ShiftController@index')
            ->withInput(Request::only('name'));
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  */
    public function show($id)
    {
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

        $shift = Shift::findOrFail($id);

        return view('backend.shifts.edit')
            ->with('shift', $shift);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ShiftRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ShiftRequest $request, $id)
    {
        $this->authorize('admin');

        $shift = Shift::findOrFail($id);
        $shift->update($request->all());

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editado');

        return redirect()
            ->action('Backend\ShiftController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');

        $shift = Shift::find($id);
        $shift->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletado');

        return redirect()
            ->action('Backend\ShiftController@index');
    }
}
