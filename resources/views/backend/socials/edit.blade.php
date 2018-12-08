@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Redes Sociais Editar</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Redes Sociais Editar</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Editar Redes Sociais</h4>
                </div>
                <div class="card-body">
                    @if (Session::has('action'))
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> 
                                As redes sociais foram editadas.
                        </div>
                    @endif     
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif        
                        <form action="{{action('Backend\SocialController@update', $social->id)}}" method="post">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />    
                            <input type="hidden" name="id" value="{{ $social->id }}">            
                            <div class="form-body">
                                <h3 class="box-title">Informações Sociais</h3>
                                <hr class="m-t-0 m-b-40">   
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control" name="facebook" value="{{ $social->facebook }}" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Youtube</label>
                                            <input type="text" class="form-control" name="youtube" value="{{ $social->youtube }}" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input type="text" class="form-control" name="twitter" value="{{ $social->twitter }}" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input type="text" class="form-control" name="instagram" value="{{ $social->instagram }}" required>
                                        </div>                                        
                                    </div>                             
                                    <!--/span-->
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