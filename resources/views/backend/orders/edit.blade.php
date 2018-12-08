@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Visualizar Pedido</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Pedido Visualizar</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <form method="get" action="{{action('Backend\OrderController@index')}}">    
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
                    <h4 class="m-b-0 text-white">Visualizar Pedido</h4>
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
                        
                            <div class="form-body">             
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Nome da instituição</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" value="{{ $order->institution_name  }}" placeholder="" required>        
                                            </div>
                                        </div>
                                    </div> 
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Subcategoria</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="unidade" value="{{ $order->subcategory_name }}" placeholder="" required>        
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Categoria</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="cnpj" value="{{ $order->category_name }}" placeholder="">        
                                            </div>
                                        </div>
                                    </div> 
                                    <!--/span-->

                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Turno</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="address" value="{{ $order->shift_name }}" placeholder="" required>        
                                                </div>
                                            </div>
                                    </div> 
                                </div>
    
    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Valor bolsa</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="cep" value="{{ $order->valor_bolsa }}" placeholder="" required>        
                                            </div>
                                        </div>
                                    </div> 
                                    <!--/span-->

                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Nome do aluno</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="phone" value="{{ $order->nome_aluno }}" placeholder="" required>        
                                                </div>
                                            </div>
                                    </div> 
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Endereço aluno</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" value="{{ $order->endereco_aluno  }}" placeholder="" required>        
                                            </div>
                                        </div>
                                    </div> 
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Nome do responsável</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="unidade" value="{{ $order->nome_responsavel }}" placeholder="" required>        
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Email do resposavel</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="cnpj" value="{{ $order->email_responsavel }}" placeholder="">        
                                            </div>
                                        </div>
                                    </div> 
                                    <!--/span-->

                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Telefone do responsavel</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="address" value="{{ $order->telefone_responsavel }}" placeholder="" required>        
                                                </div>
                                            </div>
                                    </div> 
                                </div>
    
    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">CPF do responsavel</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="cep" value="{{ $order->cpf_responsavel }}" placeholder="" required>        
                                            </div>
                                        </div>
                                    </div> 
                                    <!--/span-->

                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Nome do aluno</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="phone" value="{{ $order->nome_aluno }}" placeholder="" required>        
                                                </div>
                                            </div>
                                    </div> 
                                </div>

                                    

                            </div>

                            {{-- <hr>
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
                            </div> --}}
                </div>                    
            </div>
        </div>
    </div>
</div>
    
</div>
            

@stop