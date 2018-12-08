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
		<form id="form-register" method="POST" class="col" action="{{action('Frontend\PedidoController@pagamento')}}" autocomplete="off">
				<input type="hidden" id="_token" name="_token"  value="{{ csrf_token() }}">
				<input type="hidden" name="order_id" value="{{$order->id}}">
				<div class="steps clearfix">
					<ul class="clearfix">
						<li class="done"><a href="http://homolog.bolsalivre.com/pedido"><span class="number">1.</span> Bolsas escolhidas</a></li>
						<li class="done"><a href="http://homolog.bolsalivre.com/pedido-etapa-2"><span class="number">2.</span> Dados pessoais</a></li>
						<li class="current"><a href="javascript:void(0);"><span class="number">3.</span> Pagamento</a></li>
						<li class="disabled"><a href="javascript:void(0);"><span class="number">4.</span> Finalização</a></li>
					</ul>
				</div>

				<h3>Pagamento</h3>
				<fieldset>
					<h4>Insira os dados de seu cartão para finalizar a garantia das bolsas.</h4>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="cc-nome">Nome no cartão</label>
							<input type="text" class="form-control" name="cc_nome" id="cc_nome" placeholder="" required="">
							<small class="text-muted">Nome completo, como mostrado no cartão.</small>
						</div>
						<div class="col-md-6 mb-3">
							<label for="cc-numero">Número do cartão de crédito</label>
							<input type="text" class="form-control" name="cc_numero" id="cc_numero" placeholder="" required="">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 mb-3">
							<label for="cc-expiracao">Data de expiração</label>
							<input type="text" class="form-control" name="cc_expiracao" id="cc_expiracao" placeholder="" required="">
						</div>
						<div class="col-md-3 mb-3">
							<label for="cc-cvv">CVV</label>
							<input type="text" class="form-control" name="cc_cvv" id="cc_cvv" placeholder="" required="">
						</div>
							<input type="radio" name="cc_bandeira" id="Visa" value="Visa" checked /> <label for="Visa">Visa</label>
							<input type="radio" name="cc_bandeira" id="Master" value="Master" checked /> <label for="Master">Master</label>
							<input type="radio" name="cc_bandeira" id="Elo" value="Elo" checked /> <label for="Elo">Elo</label>
					</div>
				</fieldset>
				<div class="actions clearfix">
					<ul>
						<li class="disabled"><a href="{{action('Frontend\PedidoController@index')}}" role="menuitem">cancelar</a></li>
						<li><input type="submit" value="Efetuar Pagamento"/></li>
					</ul>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection