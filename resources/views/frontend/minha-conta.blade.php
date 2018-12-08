@extends('frontend.layouts.main')

@section('head')
    @parent
@endsection

@section('id_body', 'page')

@section('header')
    @parent
@endsection



@section('content')
@include('frontend.includes.search')
<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3 style="font-size: 22px;">Meus dados</h3>
				<form method="POST" id="form-cadastro" action="{{action('Frontend\MinhaContaController@update')}}">
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
								<strong>Sucesso!</strong> O usuário {{ $user->name }} foi {{Session::get('action')}}.
							</div>
						@endif  
						<input type="hidden" id="_token" name="_token"  value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="{{ $user->id }}">
						<div class="form-group">
							<label for="cad_nomecompleto">Nome completo *</label>
							<input type="text" class="form-control required" id="cad_nomecompleto" name="name" value="{{ $user->name }}" placeholder="Digite seu nome completo" required>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<label for="cad_email">E-mail *</label>
									<input type="email" class="form-control required" id="cad_email" name="email" value="{{ $user->email }}" placeholder="Digite seu e-mail" required>
								</div>
								<div class="col-xs-12 col-sm-6">
									<label for="cad_telefone">Telefone *</label>
									<input type="text" class="form-control required telefone" id="cad_telefone" name="telephone" value="{{ $user->telephone }}" placeholder="Digite seu telefone com DDD" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<label for="cad_senha">Senha * (Deixe em branco caso não queira alterar)</label>
									<input id="cad_senha" name="password" type="password" class="form-control">
								</div>
								<div class="col-xs-12 col-sm-6">
									<label for="cad_confirmacao">Confirmar senha *</label>
									<input id="cad_confirmacao" name="password_confirmation" type="password" class="form-control">
								</div>
							</div>
						</div>
					</fieldset>
					<input type="submit" value="Salvar" class="btn default">
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<hr style="margin: 40px 0;">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<h3 style="font-size: 22px; margin-bottom: 30px;">Minhas bolsas</h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Bolsa</th>
							<th scope="col">Instituição</th>
							<th scope="col">Data de aquisição</th>
							<th scope="col">CPM</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($orders as $order)
							{{-- @php $bolsa_obj = App\Scholarship::find($bolsa->id); @endphp --}}
							<tr>
								<th scope="row">#{{ $order->o_id }}</th>
								<td>{{ $order->category_name }} - {{ $order->subcategory_name }} - {{ $order->shift_name }} - R$ {{ $order->valor_bolsa }}</td>
								<td>{{ $order->institution_name }}</td>
								<td>{{ $order->date }}</td>
								<td><a href="{{ action('Frontend\MinhaContaController@geraCPM',  $order->o_id) }}">Baixar</a></td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

@endsection