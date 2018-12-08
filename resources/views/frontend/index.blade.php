@extends('frontend.layouts.main')

@section('head')
    @parent
@endsection

@section('id_body', 'home')

@section('header')
    @parent
@endsection

@section('content')
<section id="banner" class="d-none d-sm-block">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-xs-12">
                                <img class="img-fluid" src="{{ asset('front/img/banner.jpg') }}" alt=""/>
                        </div>
                </div>
        </div>
</section>
 
@include('frontend.includes.search')

<section id="testimonials" class="d-none d-sm-block">
	<div class="container">
		<div class="row">
            <h3 class="text-center col-xs-12 col-sm-12 col-md-12">O que andam dizendo por aí</h3>
		</div>
		<div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				@forelse ($depoimentos as $depoimento)					
                                        <div class="testimonial carousel-item @if($loop->first) active @endif">
                                                <div class="row">
                                                        <div class="col-xs-12 col-sm-2 offset-sm-1 col-md-2 offset-md-2 number_box">
                                                                <img src='{{ asset("images/testimony/$depoimento->image") }}' alt='{{ $depoimento->name }}' class="img-fluid rounded mx-auto d-block"/>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-8 col-md-6 number_box">
                                                                <p class="text-center">{{$depoimento->text}}</p>
                                                                <span class="name d-block text-center"><strong>{{$depoimento->name}}</strong></span> 
                                                                <span class="author d-block text-center">{{$depoimento->title}}</span>
                                                        </div>
                                                </div>
                                        </div>					
			        @empty
			 
			        @endforelse
			</div>
			<a class="carousel-control-prev" href="#carouselFade" role="button" data-slide="prev">
				<i class="fa fa-chevron-circle-left"></i>
			</a>
			<a class="carousel-control-next" href="#carouselFade" role="button" data-slide="next">
				<i class="fa fa-chevron-circle-right"></i>
			</a>
		</div>

	</div>
</section>

<section id="how_it_works" class="d-none d-sm-block">
        <div class="container">
                <div id="numbers">
                        <div class="row">
                                <h3 class="text-center col-xs-12 col-sm-12 col-md-12">Veja como é simples garantir a sua bolsa</h3>
                        </div>
                        <div class="row">
                                @forelse ($how_it_works as $how)
                                        <div class="col-xs-12 col-sm-12 col-md-3 number_box">
                                                <span>{{ $how->number }}</span>
                                                <h4>{{ $how->how }}</h4>
                                        </div>
                                @empty
                        
                                @endforelse
                        </div>
                </div>
        </div>
</section>
<section id="featured_discounts">
        <div class="container">
                <div class="row">
                        <h3 class="text-center col-xs-12 col-sm-12 col-md-12">Instituições em destaque</h3>
                </div>
                <div class="row">
					<?php $count = 0; ?>
                        @foreach($instituicoesDestaques as $instituicao)
							<?php if($count == 4) break; ?>
                                <div class="col-xs-12 col-sm-3 col-md-3 course">
                                        <div class="wrapper">
                                                <a href="{{ action('Frontend\pageBuscaController@show', $instituicao->slug) }}">
													<img src='{{ asset("images/institutions/$instituicao->image") }}' alt='{{ $instituicao->name }}' class="img-fluid"/>
												</a>
                                                <div class="info">
                                                    <h5><a href="javascript:void(0);">{{ $instituicao->name }}</a></h5>
                                                    <div class="tags">
                                                            @php $inst = App\Institution::find($instituicao->id);
                                                            @endphp
                                                            @isset($inst->shifts)
                                                                    @foreach($inst->shifts as $shift)                                                                
                                                                            <span>{{ $shift->name }}</span>
                                                                    @endforeach
                                                            @endisset
                                                    </div>
                                                    <div class="excerpt">
                                                            {{str_limit($instituicao->excerpt, 130)}}
                                                    </div>
                                                </div>
                                        </div>
                                </div>
							<?php $count++; ?>
                        @endforeach
                </div>
                <div class="row">
                        <a class="btn default" href="{{ action('Frontend\pageListaInstituicoesController@show') }}">Ver todas as instituições</a>
                </div>
        </div>
</section>
<section id="blog">
        <div class="container">
                <div class="row">
                        <h3 class="col-xs-12 col-sm-12 col-md-12">Blog Livre</h3>
                </div>

                <div class="row" id="highlights">

                        <div class="col-xs-12 col-md-8 pad-r-0">
                                <a href="{{$blog->link or ""}}" class="post left">
                                        <div class="wrapper" style="background-image: url('{{ asset("images/blog/$blog->image") }}');"></div>
                                        <div class="info">
                                                <span class="category">{{$blog->category  or ""}}</span>
                                                <h3>{{$blog->title  or ""}}</h3>
                                        </div>
                                </a>
                        </div>
                        <div class="col-xs-12 col-md-4">
                                <a href="{{ $blog->link_2  or "" }}" class="post right first">
                                        <div class="wrapper" style="background-image: url('{{ asset("images/blog/$blog->image_2") }}');"></div>
                                        <div class="info">
                                                <span class="category">{{ $blog->category_2  or "" }}</span>
                                                <h3>{{ $blog->title_2  or "" }}</h3>
                                        </div>
                                </a> 
                                <a href="{{$blog->link_3}}" class="post right">
                                        <div class="wrapper" style="background-image: url('{{ asset("images/blog/$blog->image_3") }}');"></div>
                                        <div class="info">
                                                <span class="category">{{ $blog->category_3  or "" }}</span>
                                                <h3>{{ $blog->title_3  or "" }}</h3>
                                        </div>
                                </a>
                        </div>
                </div>

                <div class="row">
                        <a class="btn default" href="https://bolsalivre.blog" target="_blank">Ver todas as notícias</a>
                </div>
        </div>
</section>
@endsection