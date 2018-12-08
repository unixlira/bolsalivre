@extends('frontend.layouts.main')

@section('head')
    @parent
@endsection

@section('id_body', 'page')
@section('class_body', 'single register')

@section('header')
    @parent
@endsection

@section('content')

<section id="banner">
	<div class="container">
		<div class="row">
			<div class="col my-auto">
				<h2 class="text-center">Login</h2>
			</div>
		</div>
	</div>
</section> 

@include('frontend.includes.search')
<section id="content">
	<div class="container">
		<div class="row">
			<div class="card-deck w-100">
					<div class="card w-50">
						<div class="card-body">
							<h3 class="text-center">Login</h3>
							<p class="text-center">Insira seu e-mail e sua senha para acessar nosso sistema</p>
							<form method="POST" id="form-cadastro" action="{{action('Frontend\LoginController@authenticate')}}">
								<fieldset>
									@if (count($errors) > 0)
										<div class="alert alert-danger">
											<ul>
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif   
									@if (Session::has('action'))
										<div class="alert alert-success">
											{{Session::get('action')}}.
										</div>
									@endif  
									<input type="hidden" id="_token" name="_token"  value="{{ csrf_token() }}">
									<div class="form-group">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<label for="cad_email">E-mail *</label>
												<input type="email" class="form-control required" id="cad_email" name="email" value="{{ old('email') }}" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<label for="cad_senha">Senha *</label>
												<input id="cad_senha" name="password" type="password" class="form-control required" required>
											</div>														
										</div>
									</div>
								</fieldset>
								<input type="submit" value="Enviar" class="btn default">
								<br style="clear: both;"/>
								<p class="text-right"><a href="javascript:void(0);">Esqueci minha senha.</a></p>
							</form>
						</div>
					</div>
					<div class="card w-50">
						<div class="card-body align-items-center h-100">
							<h3 class="text-center">Cadastre-se</h3>
							<p class="text-center">Ainda não tem cadastro?</p>
							<p class="text-center">Cadastre-se para garantir a sua bolsa de estudos</p>
							<a class="btn default" href="/cadastro" style="background-color: #0f183e; color: #ffffff; display: table; margin: 0 auto;">Cadastrar</a>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
@endsection