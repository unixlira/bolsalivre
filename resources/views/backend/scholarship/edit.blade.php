
@extends('layouts.main')

@section('content')

<form action="{{action('Backend\ScholarshipController@update')}}" method="post">  
    <div class="container-fluid">     
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Instituição {{$institution->name}}</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Instituição {{$institution->name}}</li>
                </ol>
            </div>

            <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">  
                    <button type="submit"  class="btn waves-effect waves-light btn-info">Salvar</button> 
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
                                @foreach ($scholarships as $scholarship)
                                    @if($subcategory->id == $scholarship->subcategory_id and $shift->id == $scholarship->shift_id)
                                        <?php 
                                            $value_array = $scholarship;
                                            $cadastroAntigo = true;

                                        ?>
                                    @endif                                    
                                @endforeach
								<tr style="border: #ffffff solid; border-width: 20px 0 0 0;">
									<th rowspan="4">
										<input type="hidden" name="subcategory_id[]" value="{{$cadastroAntigo ? $value_array->subcategory_id : $subcategory->id}}">
                                        <input type="hidden" name="shift_id[]" value="{{$cadastroAntigo ? $value_array->shift_id : $shift->id}}">
                                        {{ $subcategory->internal_subcategory.' - '.$shift->name }}
									</th>
									<th>Mensalidade Integral</th>  
									<th>Desconto</th>
									<th>Valor Final</th>
									<th>Vagas em estoque</th>
									<th>Vagas no site</th> 
									<th>Parcelas</th> 
                                    <th>Modalidade</th>
                                    <th>Dias da semana</th>
								</tr>
								<tr>
								{{-- <td>  --}}
                                        {{-- {{ $cont }} --}}
                                        <input type="hidden" name="id[]" value="{{$cadastroAntigo ? $value_array->id : 0}}">
                                        <input type="hidden" name="institution_id[]" value="{{$institution->id}}">
                                    {{-- </td> --}}
									<td> 
                                        <div class="input-group">
                                            <span class="input-group-addon">R$</span>
                                            <input class="col-md-12 form-control" type="number" step=".01" min="0" name="mensalidade[]" value="{{$cadastroAntigo ? $value_array->mensalidade : ""}}">
                                        </div>  
                                    </td>  
                                    <td> 
                                        <div class="input-group">
                                            <input class="col-md-12 form-control" type="number" step=".01" min="0" name="desconto[]" value="{{$cadastroAntigo ? $value_array->desconto : ""}}">
                                            <span class="input-group-addon">%</span>
                                        </div> 
                                    </td>
                                    <td> 
                                        <div class="input-group">
                                            <span class="input-group-addon">R$</span>
                                            <input class="form-control" type="text" placeholder="{{ ($value_array->calculoValor()) }}" readonly>
                                        </div>                                                            
                                    </td>
                                        
                                    <td> <input class="col-md-12 form-control" type="number" min="0" name="vagas_estoque[]" value="{{$cadastroAntigo ? $value_array->vagas_estoque : ""}}"> </td>
                                    <td> <input class="col-md-12 form-control" type="number" min="0" name="vagas_site[]" value="{{$cadastroAntigo ? $value_array->vagas_site : ""}}"> </td>
                                    <td> <input class="col-md-12 form-control" type="number" min="0" name="parcelas[]" value="{{$cadastroAntigo ? $value_array->parcelas : ""}}"> </td>

                                   
                                    <td>
                                        <select name="type_of_training_id[]" class="form-control">
                                            <option value="1">Desativada</option>
                                            @foreach($type_of_trainings as $c)
                                                @if($c->id != 1)
                                                    <option value="{{$c->id}}" 
                                                        @if($c->id ==  $value_array->type_of_training_id)
                                                            selected
                                                        @endif
                                                    >
                                                        {{$c->name}}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td> 
                                    
                                    <td>
                                        <select name="dia_<?=$cont?>[]" class="form-control js-select2 select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Escolha">
                                                        
                                            
                                            <option value="1" @if($cadastroAntigo) @if(isset($value_array->dias)) @if(in_array('1', json_decode($value_array->dias))) selected @endif @endif @endif>
                                                Domingo
                                            </option>

                                            <option value="2" @if(isset($value_array->dias)) @if(in_array('2',json_decode($value_array->dias))) selected @endif @endif >
                                                Segunda
                                            </option>

                                            <option value="3" @if(isset($value_array->dias)) @if(in_array('3', json_decode($value_array->dias))) selected @endif @endif >
                                                Terça
                                            </option>

                                            <option value="4" @if(isset($value_array->dias)) @if(in_array('4', json_decode($value_array->dias))) selected @endif @endif >
                                                Quarta
                                            </option>

                                            <option value="5" @if(isset($value_array->dias)) @if(in_array('5', json_decode($value_array->dias))) selected @endif @endif >
                                                Quinta
                                            </option>

                                            <option value="6" @if(isset($value_array->dias)) @if(in_array('6', json_decode($value_array->dias))) selected @endif @endif >
                                                Sexta
                                            </option>

                                            <option value="7" @if(isset($value_array->dias)) @if(in_array('7', json_decode($value_array->dias))) selected @endif @endif >
                                                Sabado
                                            </option>
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
								    <td> <input class="col-md-12 form-control" type="text"  name="horario_curso[]" value="{{$cadastroAntigo ? $value_array->horario_curso : ""}}"> </td>
                                    <td> <input class="col-md-12 form-control" type="text"  name="duracao[]" value="{{$cadastroAntigo ? $value_array->duracao : ""}}"> </td>
                                    <td> <input class="col-md-12 form-control" type="date"  name="previsao_inicio[]" value="{{$cadastroAntigo ? $value_array->previsao_inicio : ""}}"> </td>
                                    <td> <input class="col-md-12 form-control" type="text"  name="tipo_graduacao[]" value="{{$cadastroAntigo ? $value_array->tipo_graduacao : ""}}"> </td>

                                    
                                    <td>       
                                        <div class="switch">
                                            <input type="hidden" name="evolucao_preco[]" value="0" />
                                            <label><input type="checkbox" name="evolucao_preco[{{$cont}}]" value="1"
                                            @if($value_array->evolucao_preco) echo checked @endif>
                                            <span class="lever"></span></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="switch">
                                            <input type="hidden" name="fora_estoque[]" value="0" />
                                            <label><input type="checkbox" name="fora_estoque[{{$cont}}]" value="1" 
                                            @if($value_array->fora_estoque) echo checked @endif>
                                            <span class="lever"></span></label>
                                        </div>
                                    </td>
<td> 
                                        <?php  
                                            if(isset($value_array)){
                                                $scholarship_tags_ids = array();
                                                foreach ($value_array->tags as $key) {
                                                    $scholarship_tags_ids[] = $key->id;
                                                }
                                            }
                                        ?>
                                        @foreach ($tags as $tag)
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="tag[{{$cont}}][]" value="{{$tag->id}}" id="basic_checkbox_{{$contCheck}}"
                                            <?php if($cadastroAntigo and in_array($tag->id, $scholarship_tags_ids)){ echo 'checked';} ?>/>
                                            <span class="custom-control-description">{{$tag->name}}</span>
                                        <span class="custom-control-indicator"></span></label> 
                                                
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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Instituição {{$institution->name}}</li>
                </ol>
            </div>

            <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">  
                    <button type="submit"  class="btn waves-effect waves-light btn-info">Salvar</button> 
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