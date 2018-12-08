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
								<h2 class="text-center">Termos de uso e condições</h2>
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
										<div class="form-group col col-xs-12 col-sm-12 col-md-12">
												<input type="text" class="form-control" placeholder="Nome">
										</div>
										<div class="form-group col col-xs-12 col-sm-12 col-md-6">
												<input type="email" class="form-control" placeholder="E-mail">
										</div>
										<div class="form-group col col-xs-12 col-sm-12 col-md-6">
												<input type="text" class="form-control" placeholder="Telefone">
										</div>
										<div class="form-group col col-xs-12 col-sm-12 col-md-12">
												<textarea class="form-control" placeholder="Mensagem"></textarea>
										</div>
										<div class="form-group col col-xs-12 col-sm-12 col-md-12">
												<a class="btn default" href="javascript:void(0);">Enviar</a>
										</div>
								</div>
						</form>
						<div class="career">
								<h4>Trabalhe Conosco</h4>
								<p>Buscamos profissionais comprometidos com a satisfação de nossos clientes e com o crescimento da empresa, que gostam de aprender e queiram evoluir conosco. Se você tem esse perfil, envie seu currículo para
										<a href="mailto:rb@bolsalivre.com" target="_blank">rh@bolsalivre.com</a> e venha integrar nossa equipe!
								</p>
						</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-7">
						<h4>Dúvidas Frequentes</h4>
						<div class="accordion" id="accordionFAQ">
								<div class="card">
										<div class="card-header" id="headingOne">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
														O que é o Bolsa Livre?
														<i class="fa" aria-hidden="true"></i>
												</button>
										</div>
										<div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionFAQ">
												<div class="card-body">
														<p>O BolsaLivre.com é um site que oferece para toda e qualquer pessoa, bolsas de estudos parciais, disponibilizadas por instituições particulares parceiras.</p>
												</div>
										</div>
								</div>
								<div class="card">
										<div class="card-header" id="heading2">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
														O Bolsa Livre é mesmo para todos?
														<i class="fa" aria-hidden="true"></i>
												</button>
										</div>
										<div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionFAQ">
												<div class="card-body">
														<p>Sim. As bolsas são disponibilizadas para todas pessoas, que querem estudar pagando menos, que são antenadas em oportunidades e descontos, com mensalidades que cabem no bolso.</p>
												</div>
										</div>
								</div>
								<div class="card">
										<div class="card-header" id="heading3">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
														Como emitir o comprovante de pré-matrícula?
														<i class="fa" aria-hidden="true"></i>
												</button>
										</div>
										<div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionFAQ">
												<div class="card-body">
														<p>Após escolher a sua bolsa, clique em QUERO ESTA BOLSA, inscreva-se etapa seguinte - dados que vão constar no seu Comprovante de Pré-Matricula para conferência na instituição de ensino, clique em FINALIZAR COMPRA, efetue o pagamento pelo PagSeguro - através de boleto ou cartão de crédito - receba a confirmação por e-mail e a liberação do Comprovante de Pré Matrícula por e-mail e na sua conta no site.</p>
												</div>
										</div>
								</div>
								<div class="card">
										<div class="card-header" id="heading4">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
														Como saber que a bolsa está liberada para efetivar a mtrícula?
														<i class="fa" aria-hidden="true"></i>
												</button>
										</div>
										<div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionFAQ">
												<div class="card-body">
														<p>Logo que o Comprovante de Pré-Matricula estiver disponível. A liberação do documento acontece após a compensação pagamento da taxa de inscrição, que é realizada aqui mesmo no site, via cartão de crédito ou boleto bancário. Ao contrario de outros projetos, o pagamento realizado é de uma taxa única, referente e equivalente a primeira mensalidade da instituição já com a bolsa, e garante a bolsa por toda etapa de formação ou por todo curso escolhido.</p>
												</div>
										</div>
								</div>
								<div class="card">
										<div class="card-header" id="heading5">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
														O Bolsa Livre Programa Educaional é seguro?
														<i class="fa" aria-hidden="true"></i>
												</button>
										</div>
										<div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionFAQ">
												<div class="card-body">
														<p>Sim! Contribuímos com a educação no Rio de Janeiro desde 2011 em projetos similares através de sites, em projeto social de alfabetização de jovens que não tinham mais perspectivas.</p>
												</div>
										</div>
								</div>
								<div class="card">
										<div class="card-header" id="heading6">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
														O percentual da bolsa é válido durante toda etapa de formação?
														<i class="fa" aria-hidden="true"></i>
												</button>
										</div>
										<div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordionFAQ">
												<div class="card-body">
														<p>Sim! Naturalmente podem ocorrer reajustes, mas o percentual liberado no comprovante de pré-matricula é valido até a conclusão do curso ou etapa de formação.</p>
												</div>
										</div>
								</div>
								<div class="card">
										<div class="card-header" id="heading7">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
														Caso aconteça algum problema com a matrícula ou com a bolsa?
														<i class="fa" aria-hidden="true"></i>
												</button>
										</div>
										<div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordionFAQ">
												<div class="card-body">
														<p>Vamos conferir o ocorrido, e prestar esclarecimentos imediatamente. Se a matrícula não puder ser efetivada vale a nossa política “bolsa garantida ou seu dinheiro de volta”, realizamos o estorno do valor integral pago ao site Bolsa Livre.</p>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
</section>
@endsection