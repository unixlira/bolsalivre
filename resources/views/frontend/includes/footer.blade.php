<footer>
		<div class="container">
				<div class="row">
						<div class="col-xs-12 col-md-3">
								<h6>Dúvidas e Contato</h6>
								<ul class="icons">
									<li class="phone">{{ $contact->phone }}<span>{{ $contact->phone_hours }}</span></li>
									<li class="whatsapp"><a href="https://wa.me/5521994737732?text=Gostaria%20de%20mais%20detalhes%20sobre%20as%20bolsas" target="_blank" data-toggle="tooltip" data-placement="left" title="Conversar no whatsapp">{{ $contact->wpp }}</a></li>
									<li class="chat">
										<a href="javascript:void(0);" onclick="jivo_api.open();">Chat ao vivo<span>{{ $contact->chat_hours }}</span></a>
									</li>
									<li class="email">
										<a href="mailto:{{ $contact->email }}">Envie um e-mail<span>Tire suas dúvidas</span></a>
									</li>
								</ul>
						</div>
						<div class="col-xs-12 col-md-3">
								<h6>Institucional</h6>
								<p><strong>Encontre sua bolsa</strong></p>
								<ul>
										<li><a href="/instituicoes">Lista de Instituições</a></li>
										<li><a href="/cursos">Lista de Cursos</a></li>
								</ul>

								<p><strong>O Bolsa Livre</strong></p>
								<ul>
										<li><a href="/quem-somos">Quem somos</a></li>
										<li><a href="/contato#trabalhe-conosco">Trabalhe conosco</a></li>
										<li><a href="/seja-um-parceiro#content">Seja um parceiro</a></li>
										<!--<li><a href="/clube">Clube 7 de Vantagens</a></li>-->
								</ul>
						</div>
						<div class="col-xs-12 col-md-3 no-heading">
								<p><strong>Central de ajuda</strong></p>
								<ul>
										<li><a href="/passo-a-passo">Passo a Passo</a></li>
										<li><a href="/termos-de-uso-e-condicoes">Termos de Uso e Condições</a></li>
										<li><a href="/regras-do-programa">Regras do Programa</a></li>
										<li><a href="/contato#content">Perguntas Frequentes</a></li>
								</ul>

								<p><strong>Dicas Bolsa Livre</strong></p>
								<ul>
										<li><a href="https://bolsalivre.blog" target="_blank">Blog</a></li>
										<li><a href="http://siteprouni.mec.gov.br/" target="_blank">PROUNI</a></li>
										<li><a href="https://enem.inep.gov.br" target="_blank">ENEM</a></li>
								</ul>
						</div>
						<div class="col-xs-12 col-md-3 no-heading">
								<div class="social">
										<p><strong>Acompanhe nas redes</strong></p>
										<ul class="nav">
												<li>
													<a href="{{ $social->facebook }}" target="_blank"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="{{ $social->youtube }}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="{{ $social->twitter }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="{{ $social->instagram }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
												</li>
										</ul>
								</div>
								<ul class="icons">
										<li class="star">Política Bolsa Garantida<span>Sua bolsa garantida ou seu dinheiro de volta</span>
										</li>
								</ul>
								<img class="img-fluid" src="{{asset('front/img/img_security.png')}}" alt="Site Seguro. Pagamento por Pagseguro"/>
						</div>
				</div>
		</div>
		<div class="copyright">
				<div class="container">
						<div class="col-xs-12">
								<p>© Bolsa Livre 2018. Todos os direitos reservados.</p>
								<a class="author" href="https://riquebotelho.com" target="_blank"><img src="{{ asset('front/img/logotipo_rique_botelho.png')}}" alt="Desenvolvido por Rique Botelho"/></a>
						</div>
				</div>
		</div>
</footer>
<a href="https://wa.me/5521994737732?text=Gostaria%20de%20mais%20detalhes%20sobre%20as%20bolsas" target="_blank" id="whats_footer" data-toggle="tooltip" data-placement="left" title="Conversar no whatsapp"><img src="{{ asset('front/img/icon_whatsapp.png')}}" alt="{{ $contact->wpp }}"></a>
<!-- Jivochat-->
<script type='text/javascript'>
(function(){ var widget_id = 'B7ZpXI7qUo';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>