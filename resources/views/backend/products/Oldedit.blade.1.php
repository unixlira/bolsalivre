@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Produtos Editar</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Produtos Editar</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <form method="get" action="{{action('Backend\ProductController@index')}}">    
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
                    <h4 class="m-b-0 text-white">Editar Produtos</h4>
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
                        <form action="{{action('Backend\ProductController@update', $product->id)}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />    
                            <input type="hidden" name="id" value="{{ $product->id }}">  

                            <div class="form-body">             
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Nome</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="" required>        
                                            </div>
                                        </div>
                                    </div> 
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Instituição</label>
                                            <div class="col-md-9">
                                                <select name="institution_id" class="form-control">
                                                    @foreach($institutions as $c)
                                                        <option value="{{$c->id}}" 
                                                                @if($c->id ==  $product->institution_id)
                                                                    selected
                                                                @endif
                                                            >                                                 
                                                            {{$c->name}}</option>
                                                    @endforeach
                                                </select>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>


                              
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Subcategoria</label>
                                            <div class="col-md-9">
                                                <select name="subcategory_id" class="form-control">
                                                    @foreach($subcategories as $c)
                                                        <option value="{{$c->id}}" 
                                                                @if($c->id ==  $product->subcategory_id)
                                                                    selected
                                                                @endif
                                                            >                                                 
                                                            {{$c->name}}</option>
                                                    @endforeach
                                                </select>                                               
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Número de vagas</label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" name="numero_de_vagas" value="{{ $product->numero_de_vagas }}" required>        
                                                </div>
                                            </div>
                                    </div> 
                                </div>
    
    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Valor sem desconto</label>
                                            <div class="col-md-9">
                                                <input type="number" step="0.01" class="form-control" name="valor_sem_desconto" value="{{ $product->valor_sem_desconto }}" placeholder="" required>        
                                            </div>
                                        </div>
                                    </div> 
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Porcentagem aplicada</label>
                                            <div class="col-md-9">
                                                <input type="number" step="0.01" class="form-control" name="porcentagem_aplicada" value="{{ $product->porcentagem_aplicada }}" placeholder="" required>        
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Ativo</label>
                                            <div class="col-md-9">
                                                <select name="active" class="form-control">                                                       
                                                    <option value="0" 
                                                        @if(!$product->active)
                                                                selected
                                                        @endif>
                                                        Não
                                                    </option>                                                        
                                                    <option value="1"
                                                    @if($product->active)
                                                    selected
                                                    @endif>
                                                    Sim</option>                                                        
                                                </select>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <textarea class="form-control" rows="5" name="description" required>{{ $product->description }}</textarea>
                                        </div>                                        
                                    </div>
                                    <!--/span-->
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <h4 class="card-title">Imagem</h4>
                                        <small class="form-control-feedback"> Tamanho mínimo 1 x 1 px e máximo 10000 x 10000 px</small>
                                        <input type="file" name="image" id="input-file-now" class="dropify" 
                                            <?php if($product->image){ ?> data-default-file="{{ asset("storage/institutions/$product->image") }}" <?php } ?>
                                            />
                                        <input type="hidden" name="pathImage" value="institutions/<?php echo $product->image ?>" />
                                        <input type="checkbox" name="apagarImagem" id="basic_checkbox_1" />
                                        <label for="basic_checkbox_1">Apagar Imagem</label>
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