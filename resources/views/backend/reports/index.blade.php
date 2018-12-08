@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Relatórios</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Relatórios</li>
            </ol>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Relatórios</h4>
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
                        <form action="{{action('Backend\ReportController@ordersExport')}}" method="post">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />             
                            <div class="form-body">      
                                    <h3 class="box-title">Pedidos</h3>
                                    <hr class="m-t-0 m-b-40">               
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Instituição</label>
                                                <div class="col-md-9">
                                                    <select name="institution_id" class="form-control js-select2">
                                                        <option value="0">Todas </option>
                                                        @foreach($institutions as $institution)
                                                            <option value="{{$institution->id}}">{{$institution->name}}</option>
                                                        @endforeach
                                                    </select>                                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Usuário</label>
                                                <div class="col-md-9">
                                                    <select name="user_id" class="form-control js-select2">
                                                        <option value="0">Todos </option>
                                                        @foreach($users as $user)
                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>                                               
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Data início</label>                                            
                                                <div class="col-md-9">
                                                    <div class="col-10">
                                                        <input class="form-control" name="data_inicio" type="date" id="example-date-input">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Data Fim</label>                                            
                                                <div class="col-md-9">
                                                    <div class="col-10">
                                                        <input class="form-control" name="data_fim" type="date" id="example-date-input">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Pagamento</label>
                                                <div class="col-md-9">
                                                    <select name="pagamento" class="form-control js-select2">
                                                        <option value="0">Todos</option>
                                                        <option value="1">Confirmados</option>
                                                        <option value="2">Não Confirmados</option>                                                    
                                                    </select>                                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Categoria</label>
                                                <div class="col-md-9">
                                                    <select name="category_id" class="form-control js-select2">
                                                        <option value="0">Todos </option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
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
                                                    <select name="subcategory_id" class="form-control js-select2">
                                                        <option value="0">Todos </option>
                                                        @foreach($subcategories as $subcategory)
                                                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                        @endforeach
                                                    </select>                                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Turno</label>
                                                <div class="col-md-9">
                                                    <select name="shift_id" class="form-control js-select2">
                                                        <option value="0">Todos </option>
                                                        @foreach($shifts as $shift)
                                                            <option value="{{$shift->id}}">{{$shift->name}}</option>
                                                        @endforeach
                                                    </select>                                               
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-info">Exportar</button>                                                      
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                            </div>
                        </form>


                        <hr>
                        <form action="{{action('Backend\ReportController@institutionsExport')}}" method="post">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />             
                            <div class="form-body">      
                                    <h3 class="box-title">Instituições</h3>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-info">Exportar</button>                                                      
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                            </div>
                        </form>
                        <hr>
                </div>                    
            </div>
        </div>
    </div>
</div>
    
</div>
            

@stop