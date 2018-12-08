<?php

namespace App\Http\Controllers\Backend;

use Request;
use Session;
use App\User;
use App\Role;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'create']]); //Controla que apenas quem está logado pode acessar os metodos novo e remove
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (!Gate::allows('admin')) {
            return back();
        }

        $this->authorize('admin');

        $users = User::all();
        return view('backend.user.index')
            ->with('users', $users);
    }

    public function indexJson()
    {
        $users = User::all();
        return response()
            ->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin');

        $roles = Role::all();
        return view('backend.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $this->authorize('admin');

        $role_id = $request['role_id'];
        unset($request['role_id']);

        $user = new user;
        //$user  = User::create($request->all());
        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->attach($role_id);

        Session::flash('action', 'criado');

        return redirect()
            ->action('Backend\UserController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('admin');

        $user = User::findOrFail($id);
        if (empty($user)) {
            return 'Esse usuário não existe';
        }
        return view('backend.user.detalhes')
            ->with('user', $user);
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

        $user = User::findOrFail($id);

        $user_role = $user->roles()->get()->first(); //Pega a regra do usuário
        $roles = Role::all();

        return view('backend.user.edit', compact('roles', 'user_role'))
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        //Erro com MessageBag();
        // $errors = new MessageBag();
        // $errors->add('your_custom_error', 'Your custom error message!');

        // Tutorial relacionamento many to many
        //https://stackoverflow.com/questions/24702640/laravel-save-update-many-to-many-relationship

        $user = User::findOrFail($id);

        $user->roles()->sync($request->role_id); //Edita a tabela de ligação com as regras
        unset($request['role_id']); //Remove o id da regra do request

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

        Session::flash('backend.action', 'editado');
        return redirect()
            ->action('Backend\UserController@index')
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

        $user = User::find($id);
        $user->delete();
        return redirect()
            ->action('Backend\UserController@index');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
