@extends('frontend.layouts.main')

@section('head')
    @parent
@endsection

@section('id_body', 'page')

@section('header')
    @parent
@endsection

@section('content')
<section id="banner" style="background-image: url('{{ asset('front/img/background_quem_somos.jpg') }}');">
		<div class="container">
				<div class="row">
						<div class="col justify-content-center align-self-center">
								<h2 class="text-center">Sobre o Bolsa Livre</h2>
						</div>
				</div>
		</div>
</section>

@include('frontend.includes.search')

<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h4>Sobre o Bolsa Livre</h4>
				<p>Imaginavamos maneiras de como ajudar pessoas a conquistarem seus objetivos, sonhando com a educação ao alcance de todos.</p>
				<p>Após pesquisas, ouvindo pais, alunos e educadores, identificamos como contribuir com o máximo de pessoas a conseguir alcançar o sucesso.</p>
				
				<h5>Nosso compromisso</h5>
				<p>Tornar acessível o conhecimento, disponibilizando bolsas de estudos, de forma justa, rápida e simples.</p>
				
				<h5>Bolsa Livre Programa Educacional</h5>
				<p>CNPJ: 027.901.391/0001-71</p>
				<p>Sede administrativa: Rio de Janeiro – RJ</p>
				<p>Atendimento e soluções: Chat, <a href="tel:2121439986">Telefone</a>, E-mail, <a href="https://api.whatsapp.com/send?phone=55021994737732">Whatsapp</a></p>
				<p>Apoiando toda sociedade carioca, disponibilizando bolsas de estudos parciais.<br>De maneira simples, justa e rápida.</p>
				<p>&nbsp;</p>
				<p>Pesquise a sua vaga, ou peça já a sua, a um de nossos Caçadores de Bolsas de Estudos.</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
</section>
@endsection