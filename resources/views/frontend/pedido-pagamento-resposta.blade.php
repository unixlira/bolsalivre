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
			<div id="form-register" class="col" action="" autocomplete="off">
				<div class="steps clearfix">
					<ul class="clearfix">
						<li class="done"><a href="http://homolog.bolsalivre.com/pedido"><span class="number">1.</span> Bolsas escolhidas</a></li>
						<li class="done"><a href="http://homolog.bolsalivre.com/pedido-etapa-2"><span class="number">2.</span> Dados pessoais</a></li>
						<li class="current"><a href="javascript:void(0);"><span class="number">3.</span> Pagamento</a></li>
						<li class="disabled"><a href="javascript:void(0);"><span class="number">4.</span> Finalização</a></li>
					</ul>
				</div>
				@php
					// print_r($retorno);	
				@endphp
				@if(isset($retorno->Payment))
					@switch($retorno->Payment->ReturnCode)
						@case(4)
						@case(6)
							<p class="payment success"><span><i class="fa fa-smile-o" aria-hidden="true"></i> Parabéns!</span> Tudo certo com sua compra.<br/><a href="/minha-conta">Clique aqui</a> para ir até sua conta e baixar seu Comprovante de matrícula.</p>
							@break
						@case(5)
							<p class="payment error"><span><i class="fa fa-frown-o" aria-hidden="true"></i> Que pena!</span> Sua compra foi recusada pela financeira.<br/>Se preferir, entre em contato através do telefone (21)2143 9986.</p>
							@break
						@default
							<p class="payment error"><span><i class="fa fa-frown-o" aria-hidden="true"></i> Que pena!</span> Houve algum erro na sua compra.<br/>Se preferir, entre em contato através do telefone (21)2143 9986.</p>
					@endswitch
				@else 
					<p class="payment error"><span><i class="fa fa-frown-o" aria-hidden="true"></i> Que pena!</span> Houve algum erro na sua compra.<br/>Se preferir, entre em contato através do telefone (21)2143 9986.</p>
				@endif
			</div>
		</div>
	</div>
</section>
@endsection