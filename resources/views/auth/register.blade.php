@extends('layouts.login') 

@section('content')

<section id="wrapper">
    {{--  <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">          --}}
    <div class="login-register" style="background-color: #eef5f9">        
        <div class="login-box card">
        <div class="card-body">
            <form class="form-horizontal form-material" id="loginform"  method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <h3 class="box-title m-b-20">Registre-se</h3>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Nome" required autofocus>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" id="password" type="password" name="password" placeholder="Senha" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" id="password-confirm" type="password" name="password_confirmation" placeholder="Confirmar senha" required>
                    </div>
                </div>
                {{--  <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-success p-t-0 p-l-10">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                        </div>
                    </div>
                </div>  --}}
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Registre-se</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Já possui uma conta? <a href="{{ route('login') }}" class="text-info m-l-5"><b>Login</b></a></p>
                    </div>
                </div>
            </form>
            
        </div>
        </div>
    </div>

    @endsection