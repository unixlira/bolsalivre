@extends('frontend.layouts.main')

@section('head')
    @parent
@endsection

@section('id_body', 'page')
@section('class_body', 'search_result')

@section('header')
    @parent
@endsection

@section('content')

<section id="banner" style="background-image: url('{{ asset('front/img/banner_interna.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col my-auto">
                <h2 class="text-center">Lista de Cursos</h2>
                {{-- <div class="sub_term">
                    @if(old('bairro'))) <span>{{ App\Neighborhood::find(old('bairro'))->name }}</span> @endif
                    @if(old('segmento'))) <span>{{ App\Product::find(old('segmento'))->name }}</span> @endif
                    @if(old('instituicao'))) <span>{{ App\Institution::find(old('instituicao'))->name }}</span> @endif
                    @if(old('serie'))) <span>{{ App\Subcategory::find(old('serie'))->name }}</span> @endif
                </div> --}}
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            {{-- Aqui tinha a busca exclui pq só comentar estava dando erro --}}
                    @foreach ($bolsas as $bolsa) 
                    @php 
                        $bolsa = App\Scholarship::find($bolsa->id);
                        $categoria = App\Subcategory::categoriaDaSubcategoria($bolsa->subcategory_id);
                        $produto = App\Category::produtoDeUmaCategoria($categoria->id);
                    @endphp   
            <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="col course clearfix">
                            <div class="wrapper d-flex">                        
                                <div class="col-xs-12 col-sm-7 col-md-5 pad-l-0 info">
                                    <h3>
                                        <a href="javascript:void(0);">{{$bolsa->institution->name}}</a>
                                    </h3>
                                    <div class="excerpt">
                                        <p class="bairro"><strong>Bairro:</strong> {{ $bolsa->institution->neighborhood->name }}</p>
                                    <p class="segmento"><strong>Segmento:</strong> {{ $produto->name }}</p>
                                        <p class="categoria"><strong>Categoria:</strong> <td> {{ $categoria->name }} </td> </p>
                                        <p class="serie"><strong>Série:</strong> {{ $bolsa->subcategory->name }} </p>
                                    </div>
                                    <div class="tags">
                                            <span>{{  $bolsa->shift->name }}</span>                                            
                                        <span class="qtd_bolsas">Restam {{$bolsa->bolsasDisponiveis()}} bolsas</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 d-none d-sm-block">
                                    @foreach($bolsa->tags as $tag)
                                        <img src="{{ asset("storage/tags/$tag->image") }}" alt="" class="selo"/>
                                    @endforeach
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-5 pad-r-0">
                                    <div class="values clearfix">
                                        <div class="discount">
                                            <p>Bolsa de: <span>{{ $bolsa->desconto }}<small>%</small></span></p>
                                        </div>
                                        <div class="value">
                                            <p>Mensalidade: <span class="old">R$ {{ $bolsa->mensalidade }}</span>
                                                <span class="new"><small>R$</small> {{ $bolsa->calculoValor() }}</span>
                                            </p>

                                        </div>
                                    </div>
                                    <a href="{{ action('Frontend\singleInstituicaoController@show', [$bolsa->institution->slug, $categoria->slug, $bolsa->subcategory->slug]) }}" class="btn default">Ver detalhes</a>
                                </div>
                            </div>
            </div>
                        </div>
                @endforeach
                

                
                {{ $bolsas->appends(request()->query())->links() }}
        </div>
</section>
@endsection