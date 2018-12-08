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
            <div class="col-xs-12 col-sm-3 col-md-3 my-auto">
                <img src="{{ asset("storage/institutions/$instituicao->image") }}" alt=""/>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 my-auto">
                <h2>{{ $instituicao->name }}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">Resultado de Busca</a>
                        </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $instituicao->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

@include('frontend.includes.search')
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h3>Detalhes das bolsas</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 details">
                <table class="table table-sm">
                    <tr>
                        <th scope="row">Instituição</th>
                        <td>{{ $instituicao->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nível de escolaridade</th>
                        <td> {{ $produto->name }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Série/curso</th>
                        <td> {{ $categoria->name }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Turnos</th>
                        <td>
                            @php $imprimeBarra = false; @endphp
                            @foreach($instituicao->shifts as $shift)
                                @if($imprimeBarra)
                                    /
                                @endif
                                {{ $shift->name }}                                
                                @php $imprimeBarra = true; @endphp
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <!--<th class="value">Mensalidade<br/><span class="old">R$ 520</span><span class="new"><small>R$</small> 260</span>-->
                        <th>Desconto</th>
                        <td class="discount"><span><small>bolsas de até </small>@php
										$valorRedondo = $instituicao->bolsaComMaiorDesconto();
										if (strpos($valorRedondo, '.00') !== false) {
											echo str_replace('.00', '', $valorRedondo);
										} else{
											echo $valorRedondo;
										}
									@endphp<small>%</small></span>
                        </td>
                        </th>
                    </tr>
                    <tr>
                        <th>Parcelas</th>
                        <td>1 + 9</td>
                        </th>
                    </tr>
                </table>    
            @if(Auth::user())
                <form method="post" action="{{action('Frontend\singleInstituicaoController@store')}}">
                    <input type="hidden" id="_token" name="_token"  value="{{ csrf_token() }}">
            @else 
                <form method="get" action="{{action('Frontend\pageCadastroController@index')}}"> 
            @endif          
                <div id="radio_bolsa">
                    <h5>Escolha a sua bolsa abaixo e clique no botão ao lado</h5>
                    <table class="table table-hover choices">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Série</th>
                            <th scope="col">Modalidade</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Valor integral</th>
                            <th scope="col">Desconto</th>
                            <th scope="col">Valor final</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($bolsas as $bolsa) 
                            @php $bolsa = App\Scholarship::find($bolsa->id); @endphp
                                @if($bolsa->bolsasDisponiveis() > 0)     
                                    @php $subcategory = App\Subcategory::find($bolsa->subcategory->id) @endphp
                                    <tr @if($loop->first) class="selected" @endif>
                                        <th scope="row">
                                        <input type="radio" name="curso_escolhido" data-bolsas="{{$bolsa->bolsasDisponiveis() }}" value="{{ $bolsa->id }}" @if($loop->first) checked @endif></th>
                                        <td>{{ $subcategory::categoriaDaSubcategoria($subcategory->id)->name }}</td>
                                        <td>{{ $bolsa->subcategory->name }}</td>
                                        {{-- Não imprime a modalidade caso ela seja 1 --}}
                                        @if($bolsa->type_of_training->id != 1)
                                            <td>{{ $bolsa->type_of_training->name }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>{{ $bolsa->shift->name }}</td>
                                        <td>R$ {{ $bolsa->mensalidade }}</td>
                                        <td>
                                        @php
                                            $valorRedondo = $bolsa->desconto;
                                            if (strpos($valorRedondo, '.00') !== false) {
                                                echo str_replace('.00', '', $valorRedondo);
                                            } else{
                                                echo $valorRedondo;
                                            }
                                        @endphp%
                                        </td>
                                        <td>R$ {{ $bolsa->calculoValor() }}</td>
                                    </tr>
                                @endif
                        @endforeach
                        </tbody>                        
                    </table>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 finaliza_bolsa" id="action_bolsa">
                <button type="submit" class="btn default">Quero esta bolsa</button>
				<span class="qtd_bolsas">Restam <span></span> bolsas</span>
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-9">
                <div class="text">
                    <h3>Sobre a instituição</h3>
                    <p> {{ $instituicao->description }} </p>
                    <h4>Regras da Instituição</h4>
                    <ul>
                        @php $regras = explode("\r\n", $instituicao->rules); @endphp
                        @foreach($regras as $regra)
                            <li> {{ $regra }} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="sidebar_single">
                    <div class="widget">
                        <h5>Contatos da instituição</h5>
                        <p><strong>Endereço:</strong><br/>{{ $instituicao->address.', '. $instituicao->neighborhood->name}}</p>
                        <p><strong>Telefone:</strong><br/> {{ $instituicao->phone }} </p>
                    </div>
                    <a href="javascript:void(0);">
                        <img src="{{ asset('front/img/selo-bolsa-grantida.svg') }}" alt="Selo Bolsa Garantida"/> </a>
                </div>
            </div>
        </div>
</section>
@endsection