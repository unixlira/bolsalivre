<?php

namespace App\Http\Controllers\Backend;

use Storage;
use Session;
use Request;
use App\Testimony;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonyRequest;

class TestimonyController extends Controller
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

        $testimonies = Testimony::all();

        return view('backend.testimonies.index', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');

        return view('backend.testimonies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonyRequest $request)
    {
        $this->authorize('admin');

        $requestData = $request->all();

        $requestData['image'] = Testimony::imageUpload($request, 'image');

        Testimony::create($requestData);

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criada');

        return redirect()
            ->action('Backend\TestimonyController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show(Testimony $testimony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');

        $testimony = Testimony::findOrFail($id);

        return view('backend.testimonies.edit', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonyRequest $request, $id)
    {
        $this->authorize('admin');

        $requestData = $request->all();

        if (isset($requestData['apagarImagem'])) {
            Storage::delete($requestData['pathImage']);
            unset($requestData['apagarImagem']);
            $requestData['image'] = '';
        }
        unset($requestData['pathImage']);

        $testimony = Testimony::findOrFail($id);

        if ($request->hasFile('image')) {
            $requestData['image'] = Testimony::imageUpload($request, 'image');
        }

        $testimony->update($requestData);

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editada');

        return redirect()
            ->action('Backend\TestimonyController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');

        $testimony = Testimony::find($id);
        $testimony->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletada');

        return redirect()
            ->action('Backend\TestimonyController@index');
    }
}
