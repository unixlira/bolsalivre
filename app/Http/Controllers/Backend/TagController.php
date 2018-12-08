<?php

namespace App\Http\Controllers\Backend;

use Storage;
use Session;
use Request;
use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryRequest;

class TagController extends Controller
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
        $tags = Tag::all();

        return view('backend.tags.index', compact('tags'));
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
        return view('backend.tags.create', compact('categories'));
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

        $requestData['image'] = Tag::imageUpload($request, 'image');

        if (!isset($requestData['active'])) {
            $requestData['active'] = 0;
        }

        Tag::create($requestData);

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criada');

        return redirect()
            ->action('Backend\TagController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');
        $categories = Category::all();
        $tag = Tag::findOrFail($id);

        return view('backend.tags.edit', compact('categories', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
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

        if (!isset($requestData['active'])) {
            $requestData['active'] = 0;
        }

        $tag = Tag::findOrFail($id);

        if ($request->hasFile('image')) {
            $requestData['image'] = Tag::imageUpload($request, 'image');
        }

        $tag->update($requestData);

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editada');

        return redirect()
            ->action('Backend\TagController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');

        $tag = Tag::find($id);
        if ($tag->image != '') {
            $pathImage = 'tags/' . $tag->image;
            Storage::delete($pathImage);
        }

        $tag->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletada');

        return redirect()
            ->action('Backend\TagController@index');
    }
}
