@extends('frontend.layouts.main')

@section('head')
    @parent
@endsection

@section('id_body', 'page')

@section('header')
    @parent
@endsection

@section('content')
<section id="banner" style="background-image: url('{{ asset('front/img/bg_passo_a_passo.jpg') }}');">
		<div class="container">
				<div class="row">
						<div class="col justify-content-center align-self-center">
								<h2 class="text-center">Passo a passo</h2>
						</div>
				</div>
		</div>
</section>

@include('frontend.includes.search')

<section id="content" class="passos">
	<div class="container">
		<div class="row icone">
			<div class="col-sm-3">
				<img class="img-responsive icons-svgs center-block" src="{{ asset('front/img/bolsa_etapa_1.png') }}" alt="Icone ENCONTRE SUA BOLSA" title="ENCONTRE SUA BOLSA">
			</div>
			<div class="col-sm-9 text">
				<h3>Encontre sua bolsa de estudos</h3>
				<p>Aqui no Bolsa Livre você pode refinar suas opções usando filtros e lendo as descrições da Instituição, os detalhes da vaga, e as particularidades de cada curso ou segmento escolar.</p>
				<p><strong>Facilitamos a sua busca com informações importantes, elas são essenciais na hora de escolher o melhor para você.</strong></p>
			</div>
		</div>
		<div class="row icone">
			<div class="col-sm-3">
				<img class="img-responsive icons-svgs center-block" src="{{ asset('front/img/bolsa_etapa_2.png') }}" alt="Icone BOLSA LIVRE COM O COMPROVANTE title=" bolsa="" livre="" com="" o="" comprovante"="">
			</div>
			<div class="col-sm-9 text">
				<h3>Realize a inscrição do aluno e do responsável</h3>
			</div>
		</div>
		<div class="row icone">
			<div class="col-sm-3">
				<img class="img-responsive icons-svgs center-block" src="{{ asset('front/img/bolsa_etapa_3.png') }}" alt="Icone BOLSA LIVRE COM O COMPROVANTE title=" bolsa="" livre="" com="" o="" comprovante"="">
			</div>
			<div class="col-sm-9 text">
				<h3>Bolsa garantida com o comprovante de pré matrícula</h3>
				<p>Encontrou sua bolsa disponível, clique em QUERO ESSA BOLSA e faça a inscrição online ou pela central de atendimento. Com o pagamento efetuado a bolsa é garantida.</p>
				<p><strong>Lembre-se algumas bolsas são únicas, especialmente disponibilizadas, sendo garantidas para o primeiro que receber o comprovante de pré matricula.</strong></p>
			</div>
		</div>
		<div class="row icone">
			<div class="col-sm-3">
				<img class="img-responsive icons-svgs center-block" src="{{ asset('front/img/bolsa_etapa_4.png') }}" alt="Icone INVESTINDO O MÍNIMO" title="INVESTINDO O MÍNIMO">
			</div>
			<div class="col-sm-9 text">
				<h3>O comprovante de pré-matrícula garante a bolsa de estudos</h3>
				<p>Confira os dados pessoais e os da vaga selecionada. Com o comprovante de pré matricula garanta sua bolsa de estudos.</p>
				<p><strong>Atenda ao requerimento da instituição e efetive a matrícula assinando o contrato de prestação de serviços educacionais.</strong></p>
			</div>
		</div>
	</div>
</section>
@endsection