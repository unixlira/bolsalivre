<?php

namespace App\Http\Controllers\Backend;

use DB;
use Request;
use Session;
use App\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class OrderController extends Controller
{
    private $order;

    public function __construct(Order $order)
    {
        $this->middleware('auth');
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('vendedor');

        $orders = $this->order->all();

        $orders = DB::table('order_bolsa_aluno')
            ->select('order_bolsa_aluno.*', 'orders.user_id', 'orders.id as order_id')
            ->leftJoin('orders', 'orders.id', '=', 'order_bolsa_aluno.order_id')
            // ->where('order_id', '=', $request->order_id)
            ->get();

        return view('backend.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('vendedor');

        $subcategories = Subcategory::all();
        return view('backend.orders.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $this->authorize('vendedor');

        $order = new Order;
        $order = Order::create($request->all());

        $subcategory = Subcategory::find($request->input('subcategory'));
        $order->subcategories()->attach($subcategory);

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criado');

        return redirect()
            ->action('Backend\OrderController@index')
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
    //     return view('backend.orders.detalhes')
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
        $this->authorize('vendedor');

        $order = $this->order->all();

        $order = DB::table('order_bolsa_aluno')
            ->select('order_bolsa_aluno.*', 'orders.user_id', 'orders.id as order_id')
            ->leftJoin('orders', 'orders.id', '=', 'order_bolsa_aluno.order_id')
            // ->where('order_id', '=', $request->order_id)
            ->first();

        return view('backend.orders.edit', compact('order'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('vendedor');

        $order = Order::find($id);
        $order->subcategories()->detach();
        $order->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletado');

        return redirect()
            ->action('Backend\OrderController@index');
    }
}
