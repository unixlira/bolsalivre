<?php

namespace App\Http\Controllers\Backend;

use Request;
use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\HowItWorksRequest;
use App\HowItWorks;

class HowItWorksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('admin');

        $how_it_works = HowItWorks::all();

        return view('backend.how_it_works.index', compact('how_it_works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin');

        return view('backend.how_it_works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(HowItWorksRequest $request)
    {
        $this->authorize('admin');

        HowItWorks::create($request->all());

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criada');

        return redirect()
            ->action('Backend\HowItWorksController@index')
            ->withInput(Request::only('name'));
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  */
    // public function show($id)
    // {
    //     $user = User::findOrFail($id);
    //     if(empty($user)) {
    //         return "Esse usuário não existe";
    //     }
    //     return view('backend.how_it_works.detalhes')
    //         ->with('user', $user);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('admin');

        $how_it_work = HowItWorks::findOrFail($id);

        return view('backend.how_it_works.edit')
            ->with('how_it_works', $how_it_work);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  HowItWorksRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(HowItWorksRequest $request, $id)
    {
        $this->authorize('admin');

        $how_it_work = HowItWorks::findOrFail($id);
        $how_it_work->update($request->all());

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editada');

        return redirect()
            ->action('Backend\HowItWorksController@index')
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

        $how_it_work = HowItWorks::find($id);
        $how_it_work->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletada');

        return redirect()
            ->action('Backend\HowItWorksController@index');
    }
}
