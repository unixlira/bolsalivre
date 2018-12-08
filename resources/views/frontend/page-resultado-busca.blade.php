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
                <h2 class="text-center">Resultado de busca</h2>
                <div class="sub_term">
                    @if(old('bairro'))) <span>{{ App\Neighborhood::find(old('bairro'))->name }}</span> @endif
                    @if(old('segmento'))) <span>{{ App\Product::find(old('segmento'))->name }}</span> @endif
                    @if(old('instituicao'))) <span>{{ App\Institution::find(old('instituicao'))->name }}</span> @endif
                    @if(old('serie'))) <span>{{ App\Subcategory::find(old('serie'))->name }}</span> @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3" id="sidebar_filter">
                <div class="wrapper">
                    <h3>Filtre seus resultados</h3>
                    <form method="get" action="{{ action('Frontend\pageBuscaController@busca') }}">
                        <div class="form-group">
                            <label>Bairro</label>
                            {{-- Para pegar como json é só remover o comentário e o dd(), o dd deixei apenas para exibir na tela --}}
                            {{-- @php {{ dd($bairros->toJson());}} @endphp                         --}}
                            <select name="bairro" class="form-control">
                                <!-- LISTAR BAIRROS POR ORDEM ALFABÉTICA -->
                                <option value="" selected>Escolha o bairro</option>                                
                                @foreach($bairros->sortBy('name') as $bairro)
                                    <option value="{{ $bairro->id }}"
                                            @if(old('bairro') == $bairro->id)
                                                selected
                                            @endif
                                    >
                                        {{ $bairro->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" id="range_filter_sidebar" name="valor" value=""/>
                        </div>
                        <div class="form-group">
                            <label>Nível de escolaridade</label>    
                            {{-- @php {{ dd($produtos->toJson());}} @endphp  --}}
                            <select name="segmento" id="segmento" class="form-control dinamic" data-dependent="segmento">
                                <option value="" selected>Escolha o nível</option>
                                @foreach($produtos->sortBy('name') as $produto)
                                    <option value="{{ $produto->id }}"
                                            @if(old('segmento') == $produto->id)
                                                selected
                                            @endif
                                    >
                                    {{ $produto->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {{-- @php {{ dd($subcategorias->toJson());}} @endphp --}}
                            <label>Séries/Cursos</label>
                            <select name="serie" id="serie" class="form-control" data-dependent="serie">
                                <option value="" selected>Escolha a série/curso</option>
                                @foreach($subcategorias->sortBy('name') as $subcategoria)
                                    <option value="{{ $subcategoria->id }}"
                                        @if(old('serie') == $subcategoria->id)
                                            selected
                                        @endif
                                    >
                                    {{ $subcategoria->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Turno</label>
                            @php $i = 0; @endphp

                            {{-- @php {{ dd($turnos->toJson());}} @endphp --}}
                            @foreach($turnos as $turno)
                                <div class="form-check">
                                   
                                    <input name="turno[{{$i}}]" class="form-check-input" type="checkbox" value="{{$turno->id}}"  
                                        <?php
                                        if(old('turno')){
                                            if(in_array($turno->id, old('turno'))){ echo 'checked'; } 
                                        } 
                                        ?>
                                    >
                                    <label class="form-check-label" for="defaultCheck{{$i}}"> {{$turno->name}} </label>
                                </div>
                                @php $i++; @endphp
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label>Instituição</label>
                              {{-- @php {{ dd($instituicoes->toJson());}} @endphp --}}
                            <select name="instituicao" class="form-control" id="exampleFormControlSelect1">
                                <option value="" selected>Escolha a instituição</option>
                                @foreach($instituicoes->sortBy('name') as $instituicao)
                                    <option value="{{ $instituicao->id }}"
                                        @if(old('instituicao') == $instituicao->id)
                                            selected
                                        @endif
                                        >{{ $instituicao->name }} - {{ $instituicao->unidade }}</option>
                                @endforeach
                            </select>
                        </div>

						<!--
                        <div class="form-group">
                            <label>Unidade</label>
                            <select name="unidade" class="form-control" id="unidadeSelect">
                                <option value="" selected>Todas</option>
                                @foreach($instituicoes as $instituicao)
                                    <option value="{{ $instituicao->unidade }}"
                                        @if(old('unidade') == $instituicao->id)
                                            selected
                                        @endif
                                        >{{ $instituicao->unidade }}</option>
                                @endforeach
                            </select>
                        </div>
						-->
                        <div class="form-group">
                                <input type="submit" class="btn default" value="Filtrar">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9" id="all_courses">
                    @foreach ($bolsas as $bolsa) 
                    @php 
                        $bolsa = App\Scholarship::find($bolsa->id);
                        $categoria = App\Subcategory::categoriaDaSubcategoria($bolsa->subcategory_id);
                        $produto = App\Category::produtoDeUmaCategoria($categoria->id);
                    @endphp   
                        <div class="col course clearfix">
                            <div class="wrapper d-flex">                        
                                <div class="col-xs-12 col-sm-7 col-md-7 pad-l-0 info">
                                    <h3>
                                        <a href="javascript:void(0);">{{$bolsa->institution->name}}</a>
                                    </h3>
                                    <div class="excerpt">
                                        <p class="bairro"><strong>Bairro:</strong> {{ $bolsa->institution->neighborhood->name }}</p>
                                    <p class="segmento"><strong>Segmento:</strong> {{ $produto->name }}</p>
                                        <p class="categoria"><strong>Categoria:</strong> <td> {{ $categoria->name }} </td> </p>
                                        {{-- Se for eja ou ensino básico --}}
                                        @if($produto->id == 8 || $produto->id == 1)
                                            <p class="serie"><strong>Série:</strong> {{ $bolsa->subcategory->name }} </p>
                                        @else 
                                            <p class="serie"><strong>Curso:</strong> {{ $bolsa->subcategory->name }} </p>

                                        @endif
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
                                <div class="col-xs-12 col-sm-3 col-md-3 pad-r-0">
                                    <div class="values clearfix">
                                        <div class="discount">
                                            <p>Bolsa de: <span>@php
										$valorRedondo = $bolsa->desconto;
										if (strpos($valorRedondo, '.00') !== false) {
											echo str_replace('.00', '', $valorRedondo);
										} else{
											echo $valorRedondo;
										}
									@endphp<small>%</small></span></p>
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
                @endforeach
                

                
                {{ $bolsas->appends(request()->query())->links() }}
            </div>
        </div>
</section>
@endsection