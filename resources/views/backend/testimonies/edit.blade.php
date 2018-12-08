@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Depoimento Editar</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Depoimento Editar</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <form method="get" action="{{action('Backend\TestimonyController@index')}}">    
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
                    <h4 class="m-b-0 text-white">Editar Depoimento</h4>
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
                        <form action="{{action('Backend\TestimonyController@update', $testimony->id)}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />                
                            <div class="form-body">
                                <h3 class="box-title">Informações Depoimento</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <input type="hidden" name="id" value="{{ $testimony->id }}">
                                            <label class="control-label text-right col-md-3">Depoimento</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" value="{{ $testimony->name }}" placeholder="Nome" required>
                                                <small class="form-control-feedback"> Insira a Depoimento </small> </div>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Título</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="title" value="{{ $testimony->title }}" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <h4 class="card-title">Imagem</h4>
                                        <small class="form-control-feedback"> Tamanho mínimo 1 x 1 px e máximo 10000 x 10000 px</small>
                                        <input type="file" name="image" id="input-file-now" class="dropify"  data-show-remove="false"
                                            <?php if($testimony->image){ ?> data-default-file="{{ asset("storage/testimony/$testimony->image") }}" <?php } ?>
                                            />
                                        <input type="hidden" name="pathImage" value="testimony/<?php echo $testimony->image ?>" />
                                        <input type="checkbox" name="apagarImagem" id="basic_checkbox_1" />                                            
                                        <label for="basic_checkbox_1">Apagar Imagem</label>
                                    </div>
                                </div>  
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Texto</label>
                                            <textarea class="form-control" rows="5" name="text" required>{{ $testimony->text }}</textarea>
                                        </div>                                        
                                    </div>
                                    <!--/span-->
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