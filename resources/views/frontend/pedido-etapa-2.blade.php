@extends('frontend.layouts.main')

@section('head')
    @parent
@endsection

@section('id_body', 'page')
@section('class_body', 'single register')

@section('header')
    @parent
@endsection

@section('content')

<section id="banner">
		<div class="container">
				<div class="row">
						<div class="col my-auto">
								<h2 class="text-center">Meu pedido</h2>
						</div>
				</div>
		</div>
</section> 

@include('frontend.includes.search')
<section id="content">
	<div class="container">
		<div class="row">
		<form method="POST" id="form-register" class="col" action="{{action('Frontend\PedidoController@store')}}">
				<div class="steps clearfix">
					<ul class="clearfix">
						<li class="done"><a href="http://homolog.bolsalivre.com/pedido"><span class="number">1.</span> Bolsas escolhidas</a></li>
						<li class="current"><a href="javascript:void(0);"><span class="number">2.</span> Dados pessoais</a></li>
						<li class="disabled"><a href="javascript:void(0);"><span class="number">3.</span> Pagamento</a></li>
						<li class="disabled"><a href="javascript:void(0);"><span class="number">4.</span> Finalização</a></li>
					</ul>
				</div>
				<h3>Dados pessoais</h3>
				<fieldset>
					<legend>Complete com os dados do aluno e do responsável, caso necessário.</legend>
					@foreach (Cart::content() as $item)	
						@php $bolsa = App\Scholarship::findOrFail($item->id); @endphp
						@for($i=0; $i < $item->qty; $i++)

							{{-- Inputs com a bolsa --}}
							<input type="hidden" id="_token" name="_token"  value="{{ csrf_token() }}">
				
							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">

							<input type="hidden" name="scholarship_id[]" value="{{ $bolsa->id}}">

							<input type="hidden" name="institution_id[]" value="{{ $bolsa->institution->id}}">
							<input type="hidden" name="institution_name[]" value="{{ $bolsa->institution->name}}">
							<input type="hidden" name="institution_unidade[]" value="{{ $bolsa->institution->unidade}}">
							
							<input type="hidden" name="subcategory_id[]" value="{{ $bolsa->subcategory->id}}">
							<input type="hidden" name="subcategory_name[]" value="{{ $bolsa->subcategory->name}}">

							<input type="hidden" name="category_id[]" value="{{ App\Subcategory::categoriaDaSubcategoria($bolsa->subcategory->id)->id}}">
							<input type="hidden" name="category_name[]" value="{{ App\Subcategory::categoriaDaSubcategoria($bolsa->subcategory->id)->name }}">
			
							<input type="hidden" name="shift_id[]" value="{{ $bolsa->shift->id}}">
							<input type="hidden" name="shift_name[]" value="{{ $bolsa->shift->name}}">

			
							<input type="hidden" name="valor_bolsa" value="{{ $bolsa->calculoValor() }}" >
							{{-- Fim inputs bolsas --}}



							<div class="fieldGroup">
								<div class="form-group">
									<h5 style="color: #0f183e; font-size: 16px;">
										Resumo: {{ App\Subcategory::categoriaDaSubcategoria($bolsa->subcategory->id)->name }} /
										{{ $bolsa->subcategory->name}} /
										{{ $bolsa->shift->name}} /
										Valor final: R$ {{ $bolsa->calculoValor() }} /
										Qtd: 1
									</h5>
								</div>
								<div class="form-group">
									<label for="alu_nomecompleto">Nome completo do aluno *</label>
									<input type="text" class="form-control required" name="nome_aluno[]" placeholder="Digite o nome completo do aluno" required>
								</div>
								<div class="form-group">
									<label for="alu_enderecocompleto">Endereço completo do aluno *</label>
									<input type="text" class="form-control required" name="endereco_aluno[]" placeholder="Digite o endereço completo do aluno" required>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12 col-sm-6">
											<label for="alu_nomeresponsavel">Nome do responsável *</label>
											<input type="text" class="form-control required" name="nome_responsavel[]" placeholder="Digite o nome completo do responsável" required>
										</div>
										<div class="col-xs-12 col-sm-6">
											<label for="alu_emailresponsavel">E-mail do responsável *</label>
											<input type="email" class="form-control required" name="email_responsavel[]" placeholder="Digite o e-mail do responsável" required>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12 col-sm-6">
											<label for="alu_telefoneresponsavel">Telefone do responsável *</label>
											<input type="text" class="form-control required telefone" name="telefone_responsavel[]" placeholder="Digite o telefone do responsável">
										</div>
										<div class="col-xs-12 col-sm-6">
											<label for="alu_cpfresponsavel">CPF do responsável *</label>
											<input type="text" id="cpf" class="form-control required cpf" name="cpf_responsavel[]" placeholder="Digite o CPF do responsável">
										</div>
									</div>
								</div>
							</div>
						@endfor
					@endforeach
					
				</fieldset>
				<div class="actions clearfix">
					<ul>
						<li class="disabled"><a href="{{action('Frontend\PedidoController@index')}}" role="menuitem">Anterior</a></li>
						<li><input type="submit" value="Próximo"/></li>
					</ul>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection