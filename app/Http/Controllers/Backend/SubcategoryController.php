<?php

namespace App\Http\Controllers\Backend;

use Storage;
use Session;
use Request;
use App\Category;
use App\Subcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryRequest;

class SubcategoryController extends Controller
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

        $subcategories = Subcategory::all();

        return view('backend.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');

        $categories = Category::all();
        return view('backend.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
        $this->authorize('admin');

        $requestData = $request->all();

        $requestData['image'] = Subcategory::imageUpload($request, 'image');

        Subcategory::create($requestData);

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criada');

        return redirect()
            ->action('Backend\SubcategoryController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');

        $categories = Category::all();
        $subcategory = Subcategory::findOrFail($id);

        return view('backend.subcategories.edit', compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryRequest $request, $id)
    {
        $this->authorize('admin');

        $requestData = $request->all();

        if (isset($requestData['apagarImagem'])) {
            Storage::delete($requestData['pathImage']);
            unset($requestData['apagarImagem']);
            $requestData['image'] = '';
        }
        unset($requestData['pathImage']);

        $subcategory = Subcategory::findOrFail($id);

        if ($request->hasFile('image')) {
            $requestData['image'] = Subcategory::imageUpload($request, 'image');
        }

        $subcategory->update($requestData);

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editada');

        return redirect()
            ->action('Backend\SubcategoryController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');

        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletada');

        return redirect()
            ->action('Backend\SubcategoryController@index');
    }
}
