@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Segmento Adicionar</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Segmento Adicionar</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <form method="get" action="{{action('Backend\CategoryController@index')}}">    
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
                    <h4 class="m-b-0 text-white">Adicionar Segmento</h4>
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
                        <form action="{{action('Backend\CategoryController@store')}}" method="post">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />                
                            <div class="form-body">
                                <h3 class="box-title">Informações da Segmento</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Nome</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Segmento" required>
                                                <small class="form-control-feedback"> Insira a Segmento </small> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Nome interno</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="internal_category" value="{{ old('internal_category') }}" placeholder="" required>
                                                <small class="form-control-feedback"> O nome interno deve ser único </small> </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Subcategoria</label>
                                            <div class="col-md-9">
                                                <?php $cont = 1; ?>
                                                @foreach ($subcategories as $subcategory)
                                                    <input type="checkbox" name="subcategory[]" value="{{$subcategory->id}}" id="basic_checkbox_{{$cont}}" />
                                                    <label for="basic_checkbox_{{$cont}}">{{$subcategory->internal_subcategory}}</label> 
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