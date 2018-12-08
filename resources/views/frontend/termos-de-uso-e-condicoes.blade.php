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
				<div class="text">
								<p>Os Termos a seguir se aplicam ao uso dos serviços oferecidos pelo Bolsa Livre Programa Educacional, inscrito no CNPJ sob o nº 27.901.391/0001-71, dentro do site, site www.bolsalivre.com. Os serviços do Bolsa Livre deverão ser utilizados, após a devida leitura dos Termos, deve se certificar da compreensão e aceitar todas as condições definidas e informadas nos Termos e Condições Gerais e na Política de Privacidade, antes de efetuar sua inscrição no Bolsa Livre. Se você não concorda com qualquer um dos Termos citados, não utilize o serviço.</p>
								<h4>Cadastro do usuário</h4>
								<p>Para que os Candidatos possam receber os benefícios ofertados no site do Bolsa Livre Programa Educacional, objeto do presente Termo, é necessária a inscrição prévia e o aceite das Regras da Instituição de Ensino e do Bolsa Livre Programa Educacional.</p>
								<p>O USUÁRIO, neste Termo de Uso, afirma que:</p>
								<ul>
										<li>quando realizar a inscrição fornecerá dados verdadeiros, atualizados e completos sobre si;</li>
										<li>informações verdadeiras são imprescindíveis, para o preenchimento correto do documento “Comprovante de pré-matrícula”;</li>
										<li>as informações são conferidas pela Instituição Parceira no ato da matrícula;</li>
										<li>manter atualizado o perfil com novas informações ou eventual troca de endereço, e-mail ou telefone;</li>
										<li>ao efetuar o login com o FACEOOK, não enviará conteúdo qualquer criminoso como pornográfico, ameaçador, ofensivo, confidencial, denegridor de imagem, vírus.</li>
								</ul>

								<h4>Privacidade de nossos visitantes</h4>
								<p>O Bolsa Livre Programa Educacional respeita a privacidade das informações pessoais dos visitantes de seu website e tem como política não vender, distribuir ou fornecer essas informações a terceiros.</p>
								<p>Nossos servidores armazenam automaticamente as informações, quando visitam nosso site, que são utilizadas para fins estatísticos.</p>
								<p>O usuário autoriza expressamente o Bolsa Livre a se comunicar com o mesmo através de todos os canais de comunicação disponíveis, incluindo e-mail e telefone.</p>

								<h4>Sobre o benefício e a instituição de ensino</h4>
								<p>O Bolsa Livre Programa Educacional efetua o cadastramento, seleção e pré-aprovação da contratação das bolsas de estudo concedidas pelas Instituições de Ensino Parceiras.</p>
								<p>Bolsas disponibilizadas no site foram selecionadas e determinadas pela Instituição de Ensino.</p>

								<p>Informações sobre horários, turnos, endereços, disponibilidade de vagas são informadas e determinadas pelas Instituições de Ensino.</p>

								<ul>
										<li>Alterações, exclusões são realizados frequentemente;</li>
										<li>Estoques esgotam frequentemente. E a bolsa pretendida, por vezes até mesmo paga pode se esgotar sob compra concomitante entre usurários do site Bolsa Livre, e ainda entre a sala de matrículas;</li>
										<li>Não formação de turma pode ocorrer.</li>
								</ul>

								<p>Buscamos manter o site mais atualizado possível, para garantir o sucesso na efetivação da matrícula. Mas o Bolsa Livre não garante exatidão ou a integralidade de qualquer conteúdo divulgado, pois podem sofrer alterações a qualquer momento, sem aviso prévio por parte da Instituição de Ensino.</p>
								<p>Asseguramos que, o desconto obtido no site, e a matrícula efetivada, a Instituição de Ensino afirmou em contrato com o Bolsa Livre Programas Educacionais que se comprometeria em validar e manter o desconto.</p>
								<p>A validade do desconto de cada nível educacional está informada no Regulamento do site.</p>
								<p>Promoções e exceções são informadas em “Regras Gerais” da Instituição Parceira.</p>
								<p>Eventuais situações pertinentes a Instituição de Ensino, deve ser resolvida com a mesma. O Bolsa Livre não se responsabiliza por circunstâncias adversas, não salvaguardado neste Termo de Uso.</p>

								<h4>Limitação de responsabilidade</h4>
								<p>Os administradores do site Bolsa Livre não poderão ser responsabilizados se, por qualquer razão, o site ficar indisponível para acesso.</p>
								<p>Podendo ser suspenso a qualquer momento sem aviso prévio.</p>

								<h4>Alterações dos termos e condições</h4>
								<p>O Bolsa Livre não poderá ser responsabilizado, se reservando do direito sem aviso prévio por modificar o presente TERMO, por qualquer razão. Portanto sempre que acessar, ou participar, confira o Termo, bem como as Regras antes de prosseguir.</p>

								<h4>Dúvidas</h4>
								<p>Em caso de dúvida em relação ao presente documento, favor entrar em contato através do Portal do Aluno no site www.bolsalivre.com com o login de acesso.</p>
						</div>
			</div>
		</div>
</section>
@endsection