<?php

namespace App\Http\Controllers\Backend;

use Request;
use Session;
use App\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->middleware('auth');
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('admin');

        $roles = $this->role->all();

        return view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin');

        return view('backend.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        $this->authorize('admin');

        $role = new Role;
        Role::create($request->all());

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criada');

        return redirect()
            ->action('Backend\RoleController@index')
            ->withInput(Request::only('name'));
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  */
    public function show($id)
    {
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

        $role = Role::findOrFail($id);

        return view('backend.roles.edit')
            ->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RoleRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(RoleRequest $request, $id)
    {
        $this->authorize('admin');

        $role = Role::findOrFail($id);
        $role->update($request->all());

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editada');

        return redirect()
            ->action('Backend\RoleController@index')
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

        $role = Role::find($id);
        $role->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletada');

        return redirect()
            ->action('Backend\RoleController@index');
    }

    public function permissions($id)
    {
        $this->authorize('admin');

        // Recupera o role
        $role = $this->role->find($id);

        //Recuperar permissões
        $permissions = $role->permissions()->get();

        return view('backend.roles.permissions', compact('role', 'permissions'));
    }
}
