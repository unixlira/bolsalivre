@extends('frontend.layouts.main')

@section('head')
    @parent
@endsection

@section('id_body', 'page')

@section('header')
    @parent
@endsection

@section('content')
<section id="banner" style="background-image: url('{{ asset('front/img/banner_interna_contato.jpg') }}');">
		<div class="container">
				<div class="row">
						<div class="col justify-content-center align-self-center">
								<h2 class="text-center">Contato</h2>
						</div>
				</div>
		</div>
</section>

@include('frontend.includes.search')

<section id="content">
		<div class="container">
				<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-5">
								<h4>Deixe sua mensagem</h4> 
								<form>
										<div class="row">
												<div class="form-group col-sm-12 col-md-12">
														<input type="text" id="cont_nome" class="form-control" onkeyup="$('.alert_nome').alert('close')" placeholder="Nome" value="">
												</div>
												<div class="form-group col-sm-12 col-md-6">
														<input type="email" id="cont_email" class="form-control" onkeyup="$('.alert_email').alert('close')" placeholder="E-mail" value="">
												</div>
												<div class="form-group col-sm-12 col-md-6">
														<input type="text" id="cont_tel" class="form-control telefone" onkeyup="$('.alert_telefone').alert('close')" placeholder="Telefone" value="">
												</div>
												<div class="form-group  col-sm-12 col-md-12">
														<textarea class="form-control" id="cont_mensagem" onkeyup="$('.alert_mensagem').alert('close')" placeholder="Mensagem" value=""></textarea>
												</div>
												<div class="form-group  col-sm-12 col-md-12">
														<a class="btn default" id="bt_sender" href="javascript:void(0);">Enviar</a>
												</div>
												<div class="form-group  col-sm-12 col-md-12 box-contato-resposta"></div>
										</div>
								</form>
								<div class="career" id="trabalhe-conosco">
										@php
											$work_with_us = App\WorkWithUs::find(1);
										@endphp
										<h4>Trabalhe Conosco</h4>
										<p> {{ $work_with_us->text }} </p>
								</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-7">
								@php
									$faqs = App\FAQ::all();
									$count = 1;
								@endphp
								<h4>Dúvidas Frequentes</h4>
								<div class="accordion" id="accordionFAQ">
									@foreach($faqs as $faq)
										<div class="card">
												<div class="card-header" id="heading{{ $count }}">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $count }}" aria-expanded="false" aria-controls="collapse{{ $count }}">
																{{ $faq->question }}
																<i class="fa" aria-hidden="true"></i>
														</button>
												</div>
												<div id="collapse{{ $count }}" class="collapse" aria-labelledby="heading{{ $count }}" data-parent="#accordionFAQ">
														<div class="card-body">
														<p>{{ $faq->answer }}</p>
														</div>
												</div>
										</div>
										@php
											$count++;
										@endphp
									@endforeach
								</div>
						</div>
				</div>
</section>
@endsection