<?php

namespace App\Http\Controllers\Frontend;

use Session;
use URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentLink = url()->previous();

        //Verifica se a url corrente é a de login, se for não salva na sessão pois ele deve retornar para a ultima pagina antes da login
        if (!strpos($currentLink, '/login')) {
            $links = session()->has('links') ? session('links') : [];
            array_unshift($links, $currentLink); // Putting it in the beginning of links array
            session(['links' => $links]); // Saving links array to the session
        }

        return view('frontend.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
            Session::flash('action', 'Usuário logado com sucesso');
            return redirect(session('links')[0]);
        }

        Session::flash('action', 'Usuário ou senha incorretos');
        return redirect()->back();
    }
}
