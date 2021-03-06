@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Etiqueta Editar</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Etiqueta Editar</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <form method="get" action="{{action('Backend\TagController@index')}}">    
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
                    <h4 class="m-b-0 text-white">Editar Etiqueta</h4>
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
                        <form action="{{action('Backend\TagController@update', $tag->id)}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />                
                            <div class="form-body">
                                <h3 class="box-title">Informações Etiqueta</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <input type="hidden" name="id" value="{{ $tag->id }}">
                                            <label class="control-label text-right col-md-3">Etiqueta</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" value="{{ $tag->name }}" placeholder="Nome" required>
                                                <small class="form-control-feedback"> Insira a Etiqueta </small> </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <h4 class="card-title">Imagem</h4>
                                        <small class="form-control-feedback"> Tamanho mínimo 1 x 1 px e máximo 10000 x 10000 px</small>
                                        <input type="file" name="image" id="input-file-now" class="dropify"  data-show-remove="false"
                                            <?php if($tag->image){ ?> data-default-file="{{ asset("storage/tags/$tag->image") }}" <?php } ?>
                                            />
                                        <input type="hidden" name="pathImage" value="tags/<?php echo $tag->image ?>" />
                                        <input type="checkbox" name="apagarImagem" id="basic_checkbox_1" />                                            
                                        <label for="basic_checkbox_1">Apagar Imagem</label>
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="switch">
                                            <label>Ativar
                                                <input type="checkbox" name="active" value="1" <?php if($tag->active){ ?> checked <?php } ?>><span class="lever"></span>Desativar</label>
                                        </div>
                                    </div>
                                </div>                             
                                <!--/row-->                                     
                            
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