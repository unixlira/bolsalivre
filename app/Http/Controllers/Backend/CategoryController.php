<?php

namespace App\Http\Controllers\Backend;

use Request;
use Session;
use App\Category;
use App\Subcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->middleware('auth');
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('admin');

        $categories = $this->category->all();

        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin');

        $subcategories = Subcategory::all();
        return view('backend.categories.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $this->authorize('admin');

        $category = new Category;
        $category = Category::create($request->all());

        $subcategory = Subcategory::find($request->input('subcategory'));
        $category->subcategories()->attach($subcategory);

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criado');

        return redirect()
            ->action('Backend\CategoryController@index')
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
    //     return view('backend.categories.detalhes')
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

        $category = Category::findOrFail($id);
        $lista = $category->subcategories;
        $subcategories = Subcategory::all();
        $subcategories_cat = [];
        foreach ($lista as $key => $value) {
            array_push($subcategories_cat, $value->id);
        }

        return view('backend.categories.edit', compact('category', 'subcategories', 'subcategories_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->authorize('admin');

        $category = Category::findOrFail($id);
        $category->update($request->all());

        $category->subcategories()->detach();
        $subcategory = Subcategory::find($request->input('subcategory'));
        $category->subcategories()->attach($subcategory);

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editado');

        return redirect()
            ->action('Backend\CategoryController@index')
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

        $category = Category::find($id);
        $category->subcategories()->detach();
        $category->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletado');

        return redirect()
            ->action('Backend\CategoryController@index');
    }
}
