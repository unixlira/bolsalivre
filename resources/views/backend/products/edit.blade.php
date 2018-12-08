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
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <label class="control-label text-right col-md-3">Categoria</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Nome" required>
                                                <small class="form-control-feedback"> Insira a Categoria </small> </div>
                                        </div>
                                    </div>
                            

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Categoria</label>
                                            <div class="col-md-9">
                                                <?php $cont = 1; ?>
                                                @foreach ($categories as $category)
                                                    <input type="checkbox" name="category[]" value="{{$category->id}}" id="basic_checkbox_{{$cont}}"
                                                    <?php if(in_array($category->id, $categories_prod)){ echo 'checked';} ?> />
                                                    <label for="basic_checkbox_{{$cont}}">{{$category->internal_category}}</label> 
                                                    <br />  
                                                    <?php $cont++; ?>    
                                                @endforeach                                  
                                            </div>
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