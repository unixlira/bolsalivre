<?php

namespace App\Http\Controllers\Backend;

use Request;
use Session;
use App\TypeOfTraining;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeOfTrainingRequest;

class TypeOfTrainingController extends Controller
{
    private $type_of_training;

    public function __construct(TypeOfTraining $type_of_training)
    {
        $this->middleware('auth');
        $this->type_of_training = $type_of_training;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('admin');

        $type_of_trainings = $this->type_of_training->all();

        return view('backend.type_of_trainings.index', compact('type_of_trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin');

        return view('backend.type_of_trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TypeOfTrainingRequest $request)
    {
        $this->authorize('admin');

        $type_of_training = new TypeOfTraining;
        TypeOfTraining::create($request->all());

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criada');

        return redirect()
            ->action('Backend\TypeOfTrainingController@index')
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

        $type_of_training = TypeOfTraining::findOrFail($id);

        return view('backend.type_of_trainings.edit')
            ->with('type_of_training', $type_of_training);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TypeOfTrainingRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(TypeOfTrainingRequest $request, $id)
    {
        $this->authorize('admin');

        $type_of_training = TypeOfTraining::findOrFail($id);
        $type_of_training->update($request->all());

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editado');

        return redirect()
            ->action('Backend\TypeOfTrainingController@index')
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

        $type_of_training = TypeOfTraining::find($id);
        $type_of_training->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletado');

        return redirect()
            ->action('Backend\TypeOfTrainingController@index');
    }
}
