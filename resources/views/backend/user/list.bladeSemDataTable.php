@extends('layouts.main')

@section('content')



<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Table Layouts</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Table Layouts</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                        <h4 class="m-t-0 text-info">$58,356</h4></div>
                    <div class="spark-chart">
                        <div id="monthchart"></div>
                    </div>
                </div>
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                        <h4 class="m-t-0 text-primary">$48,356</h4></div>
                    <div class="spark-chart">
                        <div id="lastmonthchart"></div>
                    </div>
                </div>                           
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->


    <div class="row">                   
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">                                  
                    <div class="table-responsive"></div>
                        <table class="table color-table success-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Nome</th>
                                    <th class="text-nowrap">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($users))
                                    <div class="alert alert-info">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="text-info">
                                            <i class="fa fa-exclamation-circle"></i> Info</h3> Você não tem nenhum usuário cadastrado.
                                    </div>                                
                                @else

                                    @foreach ($users as $p)
                                        <tr>
                                            <td> {{$p->id}} </td>
                                            <td> {{$p->email}} </td>
                                            <td> {{$p->name}} </td>
                                            <td class="text-nowrap">
                                                <a href="#" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-pencil text-inverse m-r-10"></i>
                                                </a>
                                                <a href="{{action('UserController@delete', $p->id)}}" data-toggle="tooltip" data-original-title="Deletar">
                                                    <i class="fa fa-close text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>                                        
                                    @endforeach 
                                @endif
                            </tbody>
                            <td colspan="7">
                                <div class="text-right">
                                    {{ $users->links() }}
                                </div>
                            </td>
                        </table>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    
    
</div>
                    

@endsection