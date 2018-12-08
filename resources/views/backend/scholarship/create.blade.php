@extends('layouts.main') @section('content')

<form action="{{action('Backend\ScholarshipController@update')}}" method="post">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Instituição {{$institution->name}}</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Instituição {{$institution->name}}</li>
                </ol>
            </div>

            <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">
                    <button type="submit" class="btn waves-effect waves-light btn-info">Salvar</button>
                </div>
            </div>
        </div>
        <div class="row">
            @if (session()->has('message'))
            <div class="alert alert-success col-12">
                <strong>Sucesso!</strong>
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->


    <div class="row" id="tabela_customizada">
        <div class="col-12">
            <div class=" card-outline-info ">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <table class="display nowrap table table-striped table-bordered" cellspacing="0" width="100%">
                    <tbody>
                        <?php 
                                $cont = 0;
                                $contCheck = 0;
                                $cadastroAntigo = false;
                            ?>
                        @foreach ($subcategories as $subcategory)
						<tr style="border: #ffffff solid; border-width: 20px 0 0 0;">
									<th rowspan="4">
										<input type="hidden" name="subcategory_id[]" value="{{$subcategory->id}}"> {{ $subcategory->internal_subcategory }}
                                        <input type="hidden" name="shift_id[]" value="{{$shift->id}}"> {{ $shift->name }}
									</th>
									<th>Mensalidade Integral</th>  
									<th>Desconto</th>									
									<th>Vagas em estoque</th>
									<th>Vagas no site</th> 
									<th>Parcelas</th> 
                                    <th>Modalidade</th>
                                    <th>Dias da semana</th>
								</tr>
								<tr>
								{{-- <td>
                                {{ $cont }} --}}
                                <input type="hidden" name="institution_id[]" value="{{$institution->id}}">
								{{-- </td> --}}
									<td>
                                <div class="input-group">
                                    <span class="input-group-addon">R$</span>
                                    <input class="col-md-8 form-control" type="number" step=".01" min="0" name="mensalidade[]">
                                </div>
                            </td>

                            <td>
                                <div class="input-group">
                                    <input class="col-md-6 form-control" type="number" step=".01" min="0" name="desconto[]">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </td>

                            <td>
                                <input class="col-md-6 form-control" type="number" min="0" name="vagas_estoque[]">
                            </td>
                            <td>
                                <input class="col-md-6 form-control" type="number" min="0" name="vagas_site[]">
                            </td>
                            <td>
                                <input class="col-md-6 form-control" type="number" min="0" name="parcelas[]">
                            </td>
                            <td>
                                <select name="type_of_training_id[]" class="form-control">
                                    <option value="1">Desativada</option>
                                    @foreach($type_of_trainings as $c)
                                        {{-- Verifica se a modalidade é 1 e não a mostra, para não exibir modalidade no front --}}
                                        @if($c->id != 1)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>                                                     
                            <td>
                                <select name="dia_<?=$cont?>[]" class="form-control js-select2 select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Escolha">                                            
                                    <option value="1">Domingo</option>
                                    <option value="2">Segunda</option>
                                    <option value="3">Terça</option>
                                    <option value="4">Quarta</option>
                                    <option value="5">Quinta</option>
                                    <option value="6">Sexta</option>
                                    <option value="7">Sabado</option>                                            
                                </select>   
                            </td>
							  </tr>
							  <tr>
								<th style="padding-top: 20px;">Horário Curso</th>
								<th style="padding-top: 20px;">Duração</th>
								<th style="padding-top: 20px;">Previsão de Início</th>
								<th style="padding-top: 20px;">Tipo de Graduação</th>
								<th style="padding-top: 20px;">Evolução de preços</th>
								<th style="padding-top: 20px;">Fora de estoque</th>
								<th style="padding-top: 20px;">Selo</th>
							</tr>
							<tr>
								    <td>
                                <input type="text" class="form-control" name="horario_curso[]">
                               
                            </td>
                            <td>
                                <input type="text" class="form-control" name="duracao[]">                                
                            </td>
                            <td>
                                <input class="col-md-10 form-control" type="date" name="previsao_inicio[]" value="" id="example-date-input">                               
                            </td>
                            <td>
                                <input type="text" class="form-control" name="tipo_graduacao[]">                                
                            </td>
                            <td>
                                <div class="switch">
                                    <input type="hidden" name="evolucao_preco[]" value="0" />
                                    <label>
                                        <input type="checkbox" name="evolucao_preco[{{$cont}}]" value="1">
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="switch">
                                    <input type="hidden" name="fora_estoque[]" value="0" />
                                    <label>
                                        <input type="checkbox" name="fora_estoque[{{$cont}}]" value="1">
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </td>
							<td>
                                @foreach ($tags as $tag)
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="tag[{{$cont}}][]" value="{{$tag->id}}" id="basic_checkbox_{{$contCheck}}"
                                    />
                                    <span class="custom-control-description">{{$tag->name}}</span>
                                    <span class="custom-control-indicator"></span>
                                </label>

                                @endforeach
                            </td>
							</tr>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
                        <?php 
                                    $cont++;
                                    $cadastroAntigo = false;
                                ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Instituição {{$institution->name}}</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Instituição {{$institution->name}}</li>
                </ol>
            </div>

            <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">
                    <button type="submit" class="btn waves-effect waves-light btn-info">Salvar</button>
                </div>
            </div>
        </div>
        <div class="row">
            @if (session()->has('message'))
            <div class="alert alert-success col-12">
                <strong>Sucesso!</strong>
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
    </div>
</form>



@endsection