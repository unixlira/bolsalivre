@extends('frontend.layouts.main')

@section('head')
    @parent
@endsection

@section('id_body', 'page')

@section('header')
    @parent
@endsection

@section('content')
<section id="banner" style="background-image: url('{{ asset('front/img/banner_regras.jpg') }}');">
		<div class="container">
				<div class="row">
						<div class="col justify-content-center align-self-center">
								<h2 class="text-center">Regras do programa</h2>
						</div>
				</div>
		</div>
</section>

@include('frontend.includes.search')

<section id="content">
	<div class="container">
		<div class="row">
			<div class="text">
				<p>Ative a bolsa de estudos na secretaria, levando o Comprovante de Pré-Matricula, ele tem validade de 7 dias corridos. Após a emissão, podendo ser renovado pelo Bolsa Livre, com solicitação antecipada ao vencimento, se autorizado pela Instituição. A não efetivação da matricula é entendida como falta de interesse na bolsa, podendo ser liberada para outro candidato interessado.</p>
				<p>Caso precise desistir da vaga, basta entrar em contato com o Bolsa Livre, que realizamos o estorno do valor integral pago ao site. Vamos confirmar alguns dados, histórico de transações, validade do Comprovante de Pré Matrícula, dar baixa no sistema e realizar o estorno em até 5 dias.</p>
				
				<h4>Condições</h4>
				<ul>
					<li>Selecionar a bolsa pretendida</li>
					<li>Se inscrever no site ou pela central de atendimento</li>
					<li>Efetuar o pagamento da taxa de inscrição – equivalente a primeira mensalidade da escola – aqui no site do bolsa livre. Único investimento realizado no site bolsalivre.com</li>
					<li>Imprimir o Comprovante de Pré-Matricula que garante a bolsa de estudos e apresentar na secretaria para ativar a bolsa.</li>
					<li>A partir da segunda mensalidade, os pagamentos são efetuados na instituição escolhida diretamente</li>
					<li>A bolsa de estudos é válida exclusivamente para as mensalidades</li>
					<li>A bolsa de estudos é válida para alunos ingressantes na instituição pretendida</li>
					<li>Entregar a documentação requerida pela Instituição</li>
					<li>Estar de acordo com o regimento interno da Instituição</li>
					<li>Não é valido para despesas de uniforme, documentos, segunda chamada, cantina, transporte e qualquer extra</li>
					<li>Prestar vestibular caso de graduação – em caso de reprovação devolvemos integralmente o valor pago ao site bolsa livre.</li>
					<li>Assinar o contrato de prestação de serviço da Instituição de ensino escolhida</li>
					<li>A bolsa é valida vaga selecionados no site no ato da inscrição.</li>
				</ul>
				
				<h4>Validade da bolsa</h4>
				<p>No ensino básico é valida por toda etapa de formação</p>
				
				<h5>Educação infantil:</h5>
				<ul>
					<li>Berçário</li>
					<li>Maternal I</li>
					<li>Maternal I</li>
					<li>Pré I</li>
					<li>Pré II</li>
				</ul>
				
				<h5>Fundamental I:</h5>
				<ul>
					<li>1º ano</li>
					<li>2º ano</li>
					<li>3º ano</li>
					<li>4º ano</li>
					<li>5º ano</li>
				</ul>
				
				<h5>Fundamental II:</h5>
				<ul>
					<li>6º ano</li>
					<li>7º ano</li>
					<li>8º ano</li>
					<li>9º ano</li>
				</ul>
				
				<h5>Ensino médio:</h5>
				<ul>
					<li>1ª série</li>
					<li>2ª série</li>
					<li>3ª série</li>
				</ul>
				
				<h5>Para graduação, pós &amp; mba, técnicos, profissionalizantes:</h5>
				<p>É valido até a conclusão</p>
				
				<h5>Para idiomas:</h5>
				<p>A validade é definida pela instituição</p>
			</div>
		</div>
	</div>
</section>
@endsection