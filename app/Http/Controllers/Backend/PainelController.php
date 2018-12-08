<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Permission;
use App\Post;

class PainelController extends Controller
{
    public function index()
    {
        $this->authorize('admin');

        $totalUsers = User::count();
        $totalRoles = Role::count();
        $totalPermissions = Permission::count();
        $totalPosts = Post::count();

        return view('painel.home.index', compact('totalUsers', 'totalRoles', 'totalPermissions', 'totalPosts'));
    }
}
