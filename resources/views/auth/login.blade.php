@extends('layouts.login')

@section('content')
<section id="wrapper">      
    {{--  <div class="login-register" style="background-image:url({{ asset('images/background/login-register.jpg') }});">          --}}
    <div class="login-register" style="background-color: #eef5f9">        
        <div class="login-box card">
        <div class="card-body">
            <form class="form-horizontal form-material" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}               
                <h3 class="box-title m-b-20">Login</h3>

                @if ($errors->has('email'))
                    <div class="form-group  alert alert-danger">
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    </div>
                @endif
                @if ($errors->has('password'))
                    <div class="form-group alert alert-danger">
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    </div>
                @endif

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" id="email" name="email" type="email" placeholder="Email"  value="{{ old('email') }}" required autofocus> </div>
                </div>              

                                
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" id="password"  name="password" type="password"  placeholder="Senha" required> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Esqueceu sua senha?</a>
                    </div>                                     
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="checkbox-signup"> Mantenha-me conectado </label>
                        </div> 
                         
                    </div>  
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Entrar</button>
                    </div>
                </div>                
                    
                {{-- <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Não possui conta? <a href="{{ route('register') }}" class="text-info m-l-5"><b>Cadastre-se</b></a></p>
                    </div>
                </div> --}}
            </form>
            
            <form class="form-horizontal" id="recoverform" action="index.html">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>Recuperar senha</h3>
                        <p class="text-muted">Entre com seu email e instruções serão enviadas para você! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" id="email" type="email" placeholder="Email"  name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Recuperar</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    
</section>
@endsection