@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Instituição Editar</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Instituição Editar</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <form method="get" action="{{action('Backend\InstitutionController@index')}}">    
                <div class="d-flex m-t-10 justify-content-end">  
                    <button type="submit"  class="btn waves-effect waves-light btn-info">Listar</button> 
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Editar Instituição</h4>
                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif        
                        <form action="{{action('Backend\InstitutionController@update', $institution->id)}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />    
                            <input type="hidden" name="id" value="{{ $institution->id }}">  

                            <div class="form-body">             
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Nome</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" value="{{ $institution->name }}" placeholder="" required>        
                                            </div>
                                        </div>
                                    </div> 
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Unidade</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="unidade" value="{{ $institution->unidade }}" placeholder="" required>        
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Bairro</label>
                                            <div class="col-md-9">
                                                <select name="neighborhood_id" class="form-control js-select2">
                                                    @foreach($neighborhoods as $c)
                                                        <option value="{{$c->id}}" 
                                                                @if($c->id ==  $institution->neighborhood_id)
                                                                    selected
                                                                @endif
                                                            >                                                  
                                                            {{$c->name." - ".$c->city->name}}</option>
                                                    @endforeach
                                                </select>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">cnpj</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="cnpj" value="{{ $institution->cnpj }}" placeholder="">        
                                            </div>
                                        </div>
                                    </div> 
                                    <!--/span-->

                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Endereço</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="address" value="{{ $institution->address }}" placeholder="" required>        
                                                </div>
                                            </div>
                                    </div> 
                                </div>
    
    
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">cep</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="cep" value="{{ $institution->cep }}" placeholder="" required>        
                                                </div>
                                            </div>
                                        </div> 
                                        <!--/span-->
    
                                        <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Telefone</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="phone" value="{{ $institution->phone }}" placeholder="" required>        
                                                    </div>
                                                </div>
                                        </div> 
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Destaque na Home</label>
                                                <div class="col-md-9">
                                                    <select name="destaque_home" class="form-control">                                                       
                                                        <option value="0" 
                                                            @if(!$institution->destaque_home)
                                                                    selected
                                                            @endif>
                                                            Não
                                                        </option>                                                        
                                                        <option value="1"
                                                        @if($institution->destaque_home)
                                                        selected
                                                        @endif>
                                                        Sim</option>                                                        
                                                    </select>                                               
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Diretor</label>
                                                <div class="col-md-9">
                                                    <select name="user_id" class="form-control js-select2">
                                                        @foreach($users as $user)
                                                            <option value="{{$user->id}}" 
                                                                    @if($user->id ==  $institution->user_id)
                                                                        selected
                                                                    @endif
                                                                >                                                 
                                                                {{$user->name}}</option>
                                                        @endforeach
                                                    </select>                                               
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Bairros Próximos</label>                                        
                                                <select name="bairros_vizinhos[]" class="form-control js-select2 select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Escolha">
                                                        @foreach($neighborhoods as $c)
                                                        <option value="{{$c->id}}" 
                                                                @if(isset($bairros_vizinhos))
                                                                    @if(in_array($c->id, $bairros_vizinhos) )
                                                                        selected
                                                                    @endif
                                                                @endif
                                                            >                                                  
                                                            {{$c->name." - ".$c->city->name}}</option>
                                                    @endforeach
                                                </select>   
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Resumo</label>
                                                <textarea class="form-control" rows="5" name="excerpt" required>{{ $institution->excerpt }}</textarea>
                                            </div>                                        
                                        </div>                                       
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descrição</label>
                                                <textarea class="form-control" rows="5" name="description" required>{{ $institution->description }}</textarea>
                                            </div>                                        
                                        </div>                                       
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Regras e condições</label>
                                                <textarea class="form-control" rows="5" name="rules" required>{{ $institution->rules }}</textarea>
                                            </div>                                        
                                        </div>                                       
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <h4 class="card-title">Imagem</h4>
                                            <small class="form-control-feedback"> Tamanho mínimo 1 x 1 px e máximo 10000 x 10000 px</small>
                                            <input type="file" name="image" id="input-file-now" class="dropify" 
                                                <?php if($institution->image){ ?> data-default-file="{{ asset("storage/institutions/$institution->image") }}" <?php } ?>
                                             />
                                            <input type="hidden" name="pathImage" value="institutions/<?php echo $institution->image ?>" />
                                            <input type="checkbox" name="apagarImagem" id="basic_checkbox_0" />                                            
                                            <label for="basic_checkbox_0">Apagar Imagem</label>
                                        </div>
                                    </div>  

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Produto</label>
                                            <div class="col-md-9">
                                                <?php $cont = 1; ?>
                                                @foreach ($products as $product)
                                                    <input type="checkbox" name="product[]" value="{{$product->id}}" id="basic_checkbox_{{$cont}}"
                                                    <?php if(in_array($product->id, $products_inst)){ echo 'checked';} ?> />
                                                    <label for="basic_checkbox_{{$cont}}">{{$product->name}}</label> 
                                                    <br />  
                                                    <?php $cont++; ?>    
                                                @endforeach                                  
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Turno</label>
                                            <div class="col-md-9">
                                                @foreach ($shifts as $shift)
                                                    <input type="checkbox" name="shift[]" value="{{$shift->id}}" id="basic_checkbox_{{$cont}}"
                                                    <?php if(in_array($shift->id, $shifts_inst)){ echo 'checked';} ?> />
                                                    <label for="basic_checkbox_{{$cont}}">{{$shift->name}}</label> 
                                                    <br />  
                                                    <?php $cont++; ?>    
                                                @endforeach                                  
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-info">Salvar</button>                                                      
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                            </div>
                        </form>
                </div>                    
            </div>
        </div>
    </div>
</div>
    
</div>
            

@stop