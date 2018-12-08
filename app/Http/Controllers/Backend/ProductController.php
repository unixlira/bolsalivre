<?php

namespace App\Http\Controllers\Backend;

use Storage;
use Request;
use Session;
use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
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

        $products = Product::all();
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');

        $categories = category::all();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->authorize('admin');

        $product = Product::create($request->except(['category']));
        $category = Category::find($request->input('category'));
        $product->categories()->attach($category);

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criado');

        return redirect()
            ->action('Backend\ProductController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');

        $product = Product::findOrFail($id);
        $lista = $product->categories;
        $categories = Category::all();
        $categories_prod = [];
        foreach ($lista as $key => $value) {
            array_push($categories_prod, $value->id);
        }

        return view('backend.products.edit', compact('product', 'categories', 'categories_prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $this->authorize('admin');

        $product = Product::findOrFail($id);
        $product->update($request->except(['category']));

        $product->categories()->detach();
        $category = Category::find($request->input('category'));
        $product->categories()->attach($category);

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editado');

        return redirect()
            ->action('Backend\ProductController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');

        $product = Product::find($id);
        $product->categories()->detach();
        $product->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletado');

        return redirect()
            ->action('Backend\ProductController@index');
    }
}
