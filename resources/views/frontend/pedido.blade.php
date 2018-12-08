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
								<h2 class="text-center">Meu pedido</h2>
						</div>
				</div>
		</div>
</section> 

@include('frontend.includes.search')
<section id="content">
	<div class="container">
		<div class="row">
			<form id="form-register" class="col" action="{{action('Frontend\PedidoController@indexEtapa2')}}">
				<div class="steps clearfix">
					<ul class="clearfix">
						<li class="current"><a href="javascript:void(0);"><span class="number">1.</span> Bolsas escolhidas</a></li>
						<li class="disabled"><a href="javascript:void(0);"><span class="number">2.</span> Dados pessoais</a></li>
						<li class="disabled"><a href="javascript:void(0);"><span class="number">3.</span> Pagamento</a></li>
						<li class="disabled"><a href="javascript:void(0);"><span class="number">4.</span> Finalização</a></li>
					</ul>
				</div>
				<h3>Bolsas escolhidas</h3>
				<fieldset>
					<legend>Confira suas bolsas</legend>
					<table class="table table-hover ">
						<thead>
							<tr>
								<th scope="col">Categoria</th>
								<th scope="col">Série</th>
								<th scope="col">Modalidade</th>
								<th scope="col">Turno</th>
								<th scope="col">Valor integral</th>
								<th scope="col">Desconto</th>
								<th scope="col">Valor final</th>
								<th scope="col">Qtd.</th>
							</tr>
						</thead>
						<tbody>
								
							@foreach (Cart::content() as $item)
								{{-- {{dd($item)}}							 --}}
								@php $bolsa = App\Scholarship::findOrFail($item->id); @endphp 
								<tr>
									<td>{{ App\Subcategory::categoriaDaSubcategoria($bolsa->subcategory->id)->name }}</td>
									<td>{{ $bolsa->subcategory->name}}</td>
									<td></td>
									<td>{{ $bolsa->shift->name}}</td>
									<td>R$ {{ $bolsa->mensalidade }}</td>
									<td>{{ $bolsa->desconto }} %</td>
									<td>R$ {{ $bolsa->calculoValor() }}</td>
									<td><input type="number" min="1" value="{{ $item->qty }}" class="form-control" style="max-width: 80px;"/></td>
									<td>
										<a href="{{action('Frontend\PedidoController@removeBolsaCarrinho', $item->rowId)}}" data-toggle="tooltip" data-original-title="Deletar">
											<i class="fa fa-close text-danger"></i>
										</a>
									</td>
								</tr>

							@endforeach
						</tbody>                        
					</table>
				</fieldset>
				<div class="actions clearfix">
					<ul>
						<!--<li class="disabled"><a href="#previous" role="menuitem">Anterior</a></li>-->
						<li><input type="submit" value="Próximo"/></li>
					</ul>
				</div>
			</form>
		</div>
	</div>

		{{-- Não é erro, é apenas um teste para inserção do pedido
		<form action="{{action('Frontend\PedidoController@store')}}" method="post">
				<input type="hidden" id="_token" name="_token"  value="{{ csrf_token() }}">
			 
				<input type="text" name="user_id" value="1">
				<input type="text" name="scholarship_id" value="{{ $bolsa->id}}">
				<input type="text" name="institution_id" value="{{ $bolsa->institution->id}}">
				<input type="text" name="inst_name" value="{{ $bolsa->institution->name}}">
				<input type="text" name="inst_unidade" value="{{ $bolsa->institution->unidade}}">
				
				<input type="text" name="subcategory_id" value="{{ $bolsa->subcategory->id}}">
				<input type="text" name="sub_name" value="{{ $bolsa->subcategory->name}}">

				<input type="text" name="shift_id" value="{{ $bolsa->shift->id}}">
				<input type="text" name="shift_name" value="{{ $bolsa->shift->name}}">

				<input type="text" name="valor_final" value="{{ $bolsa->calculoValor() }}" >
				
				
				<input type="submit" value="enviar">
			</form> --}}
</section>
@endsection