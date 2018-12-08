@extends('frontend.layouts.main')

@section('head')
    @parent
@endsection

@section('id_body', 'page')
@section('class_body', 'single')

@section('header')
    @parent
@endsection

@section('content')

<section id="banner">
        <div class="container">
                <div class="row">
                        <div class="col my-auto">
                                <h2 class="text-center">Instituições cadastradas no Programa Bolsa Livre</h2>
                                <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="home">Home</a></li>
                                                <li class="breadcrumb-item">
                                                                <a href="/busca?bairro=&valor=0%3B1000&segmento=&serie=&instituicao=&unidade=">Encontre sua instituição</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Lista de instituições</li>
                                        </ol>
                                </nav>
                        </div>
                </div>
        </div>
</section>

@include('frontend.includes.search')

<section id="content">
		<div class="container">
				<div class="row row-eq-height">
                        @foreach($instituicoes as $instituicao)
                            <div class="col-xs-12 col-sm-4 col-md-3 institution">
                                    <div class="wrapper_institutions">
                                            <a href="{{action('Frontend\pageBuscaController@show', $instituicao->slug)}}"><img src="{{ asset("storage/institutions/$instituicao->image") }}" alt="Bolsa de estudos no Colégio Futuro Vip" class="img-fluid"/></a>
                                            <div class="info">
                                            <h5><a href="{{action('Frontend\pageBuscaController@show', $instituicao->slug)}}">{{$instituicao->name}}</a></h5>
                                                    <span class="bairro">{{$instituicao->n_name}}</span>
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
                                                    <a href="{{action('Frontend\pageBuscaController@show', $instituicao->slug)}}" class="btn default">Ver bolsas</a>
                                            </div>
                                    </div>
                            </div>
                        @endforeach
                </div>
                
</section>

{{ $instituicoes->links() }}
@endsection
