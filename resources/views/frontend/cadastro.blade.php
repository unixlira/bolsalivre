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
								<h2 class="text-center">Cadastro</h2>
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
							<h3 class="text-center">Cadastro</h3>
							<p class="text-center">Insira seus dados para criar sua conta no Bolsa Livre.</p>
						<form method="POST" id="form-cadastro" action="{{action('Frontend\pageCadastroController@store')}}">
								<fieldset> 
										<legend>Dados de acesso</legend>
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
											<strong>Sucesso!</strong>
											O usuário {{ old('question') }} foi {{Session::get('action')}}.
										</div>
										@endif  
										<input type="hidden" id="_token" name="_token"  value="{{ csrf_token() }}">
										
										<div class="form-group">
												<label for="cad_nomecompleto">Nome completo *</label>
												<input type="text" class="form-control required" id="cad_nomecompleto" name="name" value="{{ old('name') }}" placeholder="Digite seu nome completo" required>
										</div>
										<div class="form-group">
												<div class="row">
														<div class="col-xs-12 col-sm-6">
																<label for="cad_email">E-mail *</label>
																<input type="email" class="form-control required" id="cad_email" name="email" value="{{ old('email') }}" placeholder="Digite seu e-mail" required>
														</div>
														<div class="col-xs-12 col-sm-6">
																<label for="cad_telefone">Telefone *</label>
																<input type="text" class="form-control required telefone" id="cad_telefone" name="telephone" value="{{ old('telephone') }}" placeholder="Digite seu telefone com DDD" required>
														</div>
												</div>
										</div>
										<div class="form-group">
												<div class="row">
														<div class="col-xs-12 col-sm-6">
																<label for="cad_senha">Senha *</label>
																<input id="cad_senha" name="password" type="password" class="form-control required" required>
														</div>
														<div class="col-xs-12 col-sm-6">
																<label for="cad_confirmacao">Confirmar senha *</label>
																<input id="cad_confirmacao" name="password_confirmation" type="password" class="form-control required" required>
														</div>
												</div>
										</div>
								</fieldset>
								<input type="submit" value="Enviar" class="btn default">
						</form>
				</div>
				</div>
				</div>
				</div>
		</div>

		
</section>
@endsection