<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = '/admin/user';

    protected function authenticated(Request $request, $user)
    {
        if ($user->roles[0]->name = 'admin') {// do your margic here
            return redirect()->action(
                'Backend\UserController@index'
            );
        }

        if ($user->roles[0]->name = 'diretor') {// do your margic here
            return redirect()->action(
                'Backend\InstitutionController@index'
            );
        }

        if ($user->roles[0]->name = 'vendedor') {// do your margic here
            return redirect()->action(
                'Backend\PedidoController@index'
            );
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
