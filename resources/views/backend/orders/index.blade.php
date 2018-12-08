@extends('layouts.main')

@section('content')



<div class="container-fluid">   
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Pedido Listar</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Pedido Listar</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            {{-- <form method="get" action="{{action('Backend\NeighborhoodController@create')}}">    
                <div class="d-flex m-t-10 justify-content-end">  
                    <button type="submit"  class="btn waves-effect waves-light btn-info">Adicionar</button> 
                </div>
            </form> --}}
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->


    <div class="row">
        <div class="col-12">             
            <div class="card">
                
                <div class="card-body">  
                    @if (Session::has('action'))
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> 
                                O Pedido  {{ old('name') }} foi {{Session::get('action')}}.
                        </div>
                    @endif                 
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Instituição</th>
                                    <th>Usuário</th>                                    
                                    <th>Subcategoria</th>
                                    <th>Turno</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Instituição</th>
                                    <th>Usuário</th>                                    
                                    <th>Subcategoria</th>
                                    <th>Turno</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($orders as $o)
                                <tr>
                                    <td> {{$o->order_id}} </td>
                                    <td> {{$o->institution_name}} </td>                  
                                    <td> {{App\User::find($o->user_id)->name }} </td>                  
                                    <td> {{$o->subcategory_name}} </td>                  
                                    <td> {{$o->shift_name}} </td>                  
                                    <td class="text-nowrap">
                                        <a href="{{action('Backend\OrderController@edit', $o->order_id)}}" data-toggle="tooltip" data-original-title="Editar">
                                            <i class="fa fa-pencil text-inverse m-r-10"></i>
                                        </a>
                                        {{-- <a href="{{action('Backend\NeighborhoodController@destroy', $p->id)}}" data-toggle="tooltip" data-original-title="Deletar">
                                            <i class="fa fa-close text-danger"></i>
                                        </a> --}}
                                    </td>
                                </tr>  
                                @endforeach             
                            </tbody>    
                                                    
                        </table> 
                </div>
                {{--  <div class="card-body">
                    <div class="col-4">
                        <button type="button" class="btn waves-effect waves-light btn-info">Adicionar novo</button>
                    </div>
                </div>  --}}
            </div>
            
        </div>
    </div> 
</div>
                    

@endsection