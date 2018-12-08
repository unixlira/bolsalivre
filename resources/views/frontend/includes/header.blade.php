<header>            
        <div id="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <p> E-mail: <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 d-none d-sm-block">
                        <ul class="text-right">
                            <li><a class="nav-link" href="/#how_it_works">Como funciona</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-dark">
            <div class="container">
                <div class="row w-100 align-items-center">
                    <div class="col-xs-12 col-sm-12 col-md-4 d-none d-sm-block">
                            <ul class="text-left contacts">
                                <li data-toggle="tooltip" data-placement="right" data-html="true" title="<small>Atendimento:</small><br/>{{ $contact->email }}">
                                    <img src="{{ asset('front/img/icon_telefone.png')}}" alt="{{ $contact->phone }}"/> {{ $contact->phone }}
                                </li>
                                <li>
                                    <a href="https://wa.me/5521994737732?text=Gostaria%20de%20mais%20detalhes%20sobre%20as%20bolsas" target="_blank" data-toggle="tooltip" data-placement="left" title="Conversar no whatsapp"><img src="{{ asset('front/img/icon_whatsapp.png')}}" alt="{{ $contact->wpp }}"/> {{ $contact->wpp }}</a>
                                </li>
                            </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 text-center">
                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('front/img/logotipo_bolsalivre.png')}}" alt="Bolsa Livre"/>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                            <ul class="navbar-nav ml-auto">
                                @if(Auth::user())
                                    <li class="nav-item"><a  id="logout" href="#" class="nav-link" href="/minha-conta">Sair</a></li>
                                    <li class="nav-item"><a class="nav-link btn btn-outline-primary" href="/minha-conta">Minha Conta</a></li>                                    
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
								@else
									<li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
									<li class="nav-item"><a class="nav-link btn btn-outline-primary" href="/cadastro">Cadastre-se</a></li>
                                @endif
                            </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>