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
<section id="content" class="passos" style="margin-bottom: 0;">
	<div class="container">
		<div class="row icone">
			<div class="col text-center">
				<img class="img-responsive icons-svgs center-block" src="{{ asset('front/img/404.png') }}" alt="404" title="Página não encontrada" style="margin-bottom: 40px;">
				<h3>Ah não! Algo saiu errado.</h3>
				<p>Não conseguimos encontrar o que estava procurando, mas utilize a busca acima para encontrar a bolsa ideal para você.</p>
			</div>
		</div>
	</div>
</section>
@endsection