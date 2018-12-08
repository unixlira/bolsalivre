@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Contato Editar</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Contato Editar</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Editar Contato</h4>
                </div>
                <div class="card-body">
                    @if (Session::has('action'))
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> 
                                O contato foi editado.
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
                        <form action="{{action('Backend\ContactController@update', $contact->id)}}" method="post">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />    
                            <input type="hidden" name="id" value="{{ $contact->id }}">            
                            <div class="form-body">
                                <h3 class="box-title">Informações Contato</h3>
                                <hr class="m-t-0 m-b-40">   
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Atendimento Telefone</label>
                                            <input type="text" class="form-control" name="phone_hours" value="{{ $contact->phone_hours }}" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Whatsapp</label>
                                            <input type="text" class="form-control" name="wpp" value="{{ $contact->wpp }}" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Atendimento Whatsapp</label>
                                            <input type="text" class="form-control" name="wpp_hours" value="{{ $contact->wpp_hours }}" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Chat</label>
                                            <input type="text" class="form-control" name="chat" value="{{ $contact->chat }}" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Atendimento chat</label>
                                            <input type="text" class="form-control" name="chat_hours" value="{{ $contact->chat_hours }}" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $contact->email }}" required>
                                        </div>                                        
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <input type="text" class="form-control" name="address" value="{{ $contact->address }}" required>
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