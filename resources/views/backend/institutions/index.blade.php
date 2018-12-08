 @extends('layouts.main') @section('content')



<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Instituição Listar</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item active">Instituição Listar</li>
            </ol>
        </div>
        @can('admin')
            <div class="col-md-7 col-4 align-self-center">
                <form method="get" action="{{action('Backend\InstitutionController@create')}}">
                    <div class="d-flex m-t-10 justify-content-end">
                        <button type="submit" class="btn waves-effect waves-light btn-info">Adicionar</button>
                    </div>
                </form>
            </div>
        @endcan
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
                        A Instituição {{ old('question') }} foi {{Session::get('action')}}.
                    </div>
                    @endif
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="8%">#</th>
                                <th>Nome</th>
                                <th>Unidade</th>
                                <th>Turnos</th>
                                <th width="15%" style="text-align:center">Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width="8%">#</th>
                                <th>Nome</th>
                                <th>Unidade</th>
                                <th>Turnos</th>
                                <th width="8%" style="text-align:center">Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($institutions as $institution)
                            <tr>
                                <?php 
                                // echo($p->shifts);
                                ?>
                                <td> {{ $institution->id }} </td>
                                <td> {{ $institution->name }} </td>
                                <td> {{ $institution->unidade }} </td>
                                <td> 
                                    @foreach ($institution->shifts as $shift)
                                        @if ($institution->instituionHasScholarship($shift->id))
                                            <a href="{{action('Backend\ScholarshipController@edit', [$institution->id, $shift->id ,])}}" data-toggle="tooltip" data-original-title="Editar Bolsas {{$shift->name}}">
                                                <i class="fa fa-book text-primary m-r-10"></i>
                                            </a>
                                        @else
                                            <a href="{{action('Backend\ScholarshipController@create', [$institution->id, $shift->id ,])}}" data-toggle="tooltip" data-original-title="Criar Bolsas {{$shift->name}}">
                                                <i class="fa fa-book text-inverse m-r-10"></i>
                                            </a>
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-nowrap" style="text-align:right">                                    

                                    <a href="{{action('Backend\InstitutionController@edit', $institution->id)}}" data-toggle="tooltip" data-original-title="Editar">
                                        <i class="fa fa-pencil text-inverse m-r-10"></i>
                                    </a>
                                    <a href="{{action('Backend\InstitutionController@destroy', $institution->id)}}" data-toggle="tooltip" data-original-title="Deletar">
                                        <i class="fa fa-close text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                {{--
                <div class="card-body">
                    <div class="col-4">
                        <button type="button" class="btn waves-effect waves-light btn-info">Adicionar novo</button>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
</div>


@endsection