<?php

namespace App\Http\Controllers\Backend;

use Request;
use Session;
use App\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->middleware('auth');
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('admin');

        $permissions = $this->permission->all();

        return view('backend.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin');

        return view('backend.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PermissionRequest $request)
    {
        $this->authorize('admin');

        $permission = new Permission;
        Permission::create($request->all());

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criada');

        return redirect()
            ->action('Backend\PermissionController@index')
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

        $permission = Permission::findOrFail($id);

        return view('backend.permissions.edit')
            ->with('permission', $permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $this->authorize('admin');

        $permission = Permission::findOrFail($id);
        $permission->update($request->all());

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editada');

        return redirect()
            ->action('Backend\PermissionController@index')
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

        $permission = Permission::find($id);
        $permission->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletada');

        return redirect()
            ->action('Backend\PermissionController@index');
    }

    public function roles($id)
    {
        $this->authorize('admin');

        // Recupera a permission
        $permission = $this->permission->find($id);

        //Recuperar permissões
        $roles = $permission->roles()->get();

        return view('backend.permissions.roles', compact('permission', 'roles'));
    }
}
