@extends('layouts.main') @section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Usuário Adicionar</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item active">Usuário Adicionar</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <form method="get" action="{{action('Backend\UserController@index')}}">
                <div class="d-flex m-t-10 justify-content-end">
                    <button type="submit" class="btn waves-effect waves-light btn-info">Usuário Listar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Adicionar usuário</h4>
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
                    <form action="{{action('Backend\UserController@store')}}" method="post">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <div class="form-body">
                            <h3 class="box-title">Informações pessoais</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Nome</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nome" required>
                                            <small class="form-control-feedback"> Insira o nome do usuário </small>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="email" value="{{ old('email') }}" placeholder="Insira o Email"
                                                required>
                                            <small class="form-control-feedback"> Insira o email. </small>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Telefone</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" placeholder="" required>
                                            <small class="form-control-feedback"> Insira o nome telefone </small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Regras</label>
                                        <div class="col-md-9">
                                            <select name="role_id" class="form-control">
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Senha</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" name="password" placeholder="Senha" required>
                                            <small class="form-control-feedback"> Insira a senha do usuário </small>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Confirmar senha</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control form-control-danger" name="password_confirmation" placeholder="Confirmar senha"
                                                required>
                                            <small class="form-control-feedback"> This field has error. </small>
                                        </div>
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