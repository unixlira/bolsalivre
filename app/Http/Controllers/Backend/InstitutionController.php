<?php

namespace App\Http\Controllers\Backend;

use Gate;
use Storage;
use Request;
use Session;
use App\Shift;
use App\Product;
use App\Institution;
use App\Neighborhood;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InstitutionRequest;
use Illuminate\Support\Facades\DB;

class InstitutionController extends Controller
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
        if (Gate::allows('admin')) {
            $institutions = Institution::all();
        } else {
            $institutions = Institution::where('user_id', Auth::id())->get();
        }
        return view('backend.institutions.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');

        $users = DB::table('users')
        ->orderBy('name', 'asc')
        ->get();

        $shifts = Shift::all();
        $products = Product::all();
        $neighborhoods = Neighborhood::all();
        return view('backend.institutions.create', compact('neighborhoods', 'products', 'shifts', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstitutionRequest $request)
    {
        $this->authorize('admin');

        $institution = new Institution;

        $requestData = $request->except('image', 'product', 'shift');
        $requestData['image'] = Institution::imageUpload($request, 'image');
        $requestData['bairros_vizinhos'] = json_encode($request->input('bairros_vizinhos'));

        $institution = Institution::create($requestData);

        $products = Product::find($request->input('product'));
        $institution->products()->attach($products);

        $shifts = Shift::find($request->input('shift'));
        $institution->shifts()->attach($shifts);

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        // Session::flash('action', "criada");

        return redirect()
            ->action('Backend\InstitutionController@index')
            ->withInput(Request::only('image'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institution = Institution::findOrFail($id);

        //controla que apenas o admin ou o usuário especificado pode acessar a instituição
        if (!((Auth::id() == $institution->user_id) or Gate::allows('admin'))) {
            abort(403, 'Unautorized');
        }

        //Lista todos os usuários (Para cadastro de diretores)
        $users = DB::table('users')
            ->orderBy('name', 'asc')
            ->get();
        //Lista todos os bairros
        $neighborhoods = Neighborhood::all();

        //Lista todos os turnos e todos os turnos vinculados a uma instituição
        $shifts = Shift::all();
        $list = $institution->shifts;
        $shifts_inst = [];
        foreach ($list as $key => $value) {
            array_push($shifts_inst, $value->id);
        }

        $bairros_vizinhos = json_decode($institution->bairros_vizinhos);

        //Lista todos os produtos e todos os produtos vinculados a uma instituição
        $products = Product::all();
        $list = $institution->products;
        $products_inst = [];
        foreach ($list as $key => $value) {
            array_push($products_inst, $value->id);
        }

        return view('backend.institutions.edit', compact('institution', 'users', 'neighborhoods', 'shifts', 'shifts_inst', 'products', 'products_inst', 'bairros_vizinhos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(InstitutionRequest $request, $id)
    {
        $institution = Institution::findOrFail($id);

        //controla que apenas o admin ou o usuário especificado pode acessar a instituição
        if (!((Auth::id() == $institution->user_id) or Gate::allows('admin'))) {
            abort(403, 'Unautorized');
        }

        $requestData = $request->except('product', 'shift');

        if (isset($requestData['apagarImagem'])) {
            Storage::delete($requestData['pathImage']);
            unset($requestData['apagarImagem']);
            $requestData['image'] = '';
        }
        unset($requestData['pathImage']);

        if ($request->hasFile('image')) {
            $requestData['image'] = Institution::imageUpload($request, 'image');
        }

        $requestData['bairros_vizinhos'] = json_encode($request->input('bairros_vizinhos'));

        $institution->update($requestData);

        $institution->products()->sync($request->input('product'));
        $institution->shifts()->sync($request->input('shift'));

        //deletar bolsas vinculadas a uma categoria quando ela for removida no update
        $scholarships_ids = DB::table('categories')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'products.id', '=', 'category_product.product_id')
            ->whereNotIn('products.id', $request->input('product'))
            ->distinct()
            ->join('category_subcategory', 'categories.id', '=', 'category_subcategory.category_id')
            ->join('subcategories', 'subcategories.id', '=', 'category_subcategory.subcategory_id')
            ->join('scholarships', 'subcategories.id', '=', 'scholarships.subcategory_id')
            ->where('scholarships.institution_id', '=', $id)
            ->pluck('scholarships.id')->toArray();
        if ($scholarships_ids) {
            DB::table('scholarships')->whereIn('scholarships.id', $scholarships_ids)->delete();
        }

        //deletar bolsas vinculados a um turno quando ele for removido no update
        $shifts = DB::table('scholarships')
            ->where('institution_id', '=', $id)
            ->whereNotIn('shift_id', $request->input('shift'))
            ->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editada');

        return redirect()
            ->action('Backend\InstitutionController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');

        $institution = Institution::find($id);
        $institution->delete();

        //deletar também as bolsas vinculadas a uma categoria
        $scholarships = DB::table('scholarships')
            ->where('institution_id', '=', $id)
            ->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletada');

        return redirect()
            ->action('Backend\InstitutionController@index');
    }
}
