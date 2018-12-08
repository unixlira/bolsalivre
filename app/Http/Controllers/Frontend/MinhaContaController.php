<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use Session;
use App\Scholarship;

class MinhaContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $orders = Scholarship::bolsasCompradasUsuario($user->id);

        return view('frontend.minha-conta', compact('user', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserUpdateRequest $request)
    {
        //Erro com MessageBag();
        // $errors = new MessageBag();
        // $errors->add('your_custom_error', 'Your custom error message!');

        // Tutorial relacionamento many to many
        //https://stackoverflow.com/questions/24702640/laravel-save-update-many-to-many-relationship

        if ($request->id == Auth::user()->id) {
            $user = User::findOrFail($request->id);

            if ($request->password) {
                $valores = $request->all();

                $data = [
                    'name' => $valores['name'],
                    'email' => $valores['email'],
                    'telephone' => $valores['telephone'],
                    'password' => Hash::make($valores['password']),
                ];
            } else {
                $data = $request->except(['password']);
            }

            $user->update($data);

            Session::flash('action', 'editado');
            return redirect()
                ->action('Frontend\MinhaContaController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function geraCPM($order_id)
    {
        $order = Scholarship::bolsaDeUmPedido($order_id);
        dd($order);
        // return view('frontend.CPM', compact('order'));
    }
}
