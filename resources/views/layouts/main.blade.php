<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <title>{{ config('app.name', ' $titulo') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('css/blue.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- select2 -->
    <link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" id="theme" rel="stylesheet">
</head>

<body class="fix-header card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="javascript>void(0);">
                            <img src="{{ asset('images/logotipo_bolsalivre_back.png') }}" alt="Logotipo Bolsa Livre" style="height: 40px;" class="light-logo" />
					</a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                            <div class="dropdown-menu scale-up-left">
                                <ul class="mega-dropdown-menu row">
                                    <li class="col-lg-3 col-xlg-2 m-b-30">
                                        <h4 class="m-b-20">CAROUSEL</h4>
                                        <!-- CAROUSEL -->
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container"> <img class="d-block img-fluid" src="../assets/images/big/img1.jpg" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img2.jpg" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img3.jpg" alt="Third slide"></div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                        </div>
                                        <!-- End CAROUSEL -->
                                    </li>
                                    <li class="col-lg-3 m-b-30">
                                        <h4 class="m-b-20">ACCORDION</h4>
                                        <!-- Accordian -->
                                        <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingOne">
                                                    <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Collapsible Group Item #1
                                                </a>
                                              </h5> </div>
                                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Collapsible Group Item #2
                                                </a>
                                              </h5> </div>
                                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingThree">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Collapsible Group Item #3
                                                </a>
                                              </h5> </div>
                                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">CONTACT US</h4>
                                        <!-- Contact -->
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </li>
                                    <li class="col-lg-3 col-xlg-4 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                       
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-account"></i></a>
                            {{-- <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/users/user.svg') }}" alt="usuário" class="profile-pic" /></a> --}}
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{ asset('images/users/user.svg') }}" alt="usuário"></div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p></div>
                                        </div>
                                    </li>
                                    {{-- <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> Meu Perfil</a></li> --}}
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a id="logout" href="#" class="btn btn-default btn-flat">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>                       
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        @can('admin')
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Usuários </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{action('Backend\UserController@index')}}">Usuários</a></li>
                                    {{-- <li><a href="{{action('Backend\PermissionController@index')}}">Permissões</a></li>
                                    <li><a href="{{action('Backend\RoleController@index')}}">Regras</a></li> --}}
                                </ul>
                            </li>
                        @endcan
                        @can('admin')
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Categorias</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{action('Backend\TypeOfTrainingController@index')}}">Modalidade</a></li> 
                                    <li><a href="{{action('Backend\ShiftController@index')}}">Turno</a></li> 
                                    <li><a href="{{action('Backend\CategoryController@index')}}">Segmentos</a></li>                                
                                    <li><a href="{{action('Backend\SubcategoryController@index')}}">Subcategorias</a></li>
                                    
                                    
                                </ul>
                            </li>
                        @endcan
                        @can('diretor')
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Instituições</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{action('Backend\InstitutionController@index')}}">Instituições</a></li>                                
                                @can('admin')
                                    <li><a href="{{action('Backend\CityController@index')}}">Cidades</a></li>
                                    <li><a href="{{action('Backend\NeighborhoodController@index')}}">Bairros</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('admin')
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Configurações</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{action('Backend\FAQController@index')}}">FAQ</a></li>
                                    <li><a href="{{action('Backend\HowItWorksController@index')}}">Como funciona</a></li>
                                    <li><a href="{{action('Backend\WorkWithUsController@edit', 1)}}">Trabalhe Conosco</a></li>
                                    <li><a href="{{action('Backend\ContactController@edit', 1)}}">Contato</a></li>
                                    <li><a href="{{action('Backend\SocialController@edit', 1)}}">Redes Sociais</a></li>
                                    <li><a href="{{action('Backend\TagController@index', 1)}}">Etiquetas</a></li>
                                    <li><a href="{{action('Backend\TestimonyController@index')}}">Depoimentos</a></li>
                                    <li><a href="{{action('Backend\BlogController@edit', 1)}}">Blog</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('admin')
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Produtos</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{action('Backend\ProductController@index')}}">Produtos</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('vendedor')
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Pedido</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{action('Backend\OrderController@index')}}">Pedido</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('admin')
                            <li>
                                <a class="has-arrow " href="{{action('Backend\ReportController@index')}}" aria-expanded="false">
                                    <i class="mdi mdi-bullseye"></i><span class="hide-menu">Relatórios</span>
                                </a>
                                
                            </li>
                        @endcan
                     
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            @yield('content')

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2018 Bolsa livre
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>

    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>

    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>

    <!--stickey kit -->
    <script src="{{ asset('plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>


    <!-- This is data table -->
    <!-- This is data table -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    {{--  <script src="https:///cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"></script>  --}}
    
    <!-- end - This is for export functionality only -->
    <script>
   
    $('#example23').DataTable({
        "displayLength": 25,
        dom: 'Bfrtip',
        "order": [[ 0, "desc" ]],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            //"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfo": "",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });

    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>

    <script>
        $(function() {
            $('#logout').click(function(e) {
                e.preventDefault();
                $('#logout-form').submit()
            })
        })
    </script>

<!-- ============================================================== -->
<!-- jQuery file upload -->
<script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify({
            messages: {
                'default': '',
                'replace': 'Arraste e solte ou clique para substituir',
                'remove':  'Remover',
                'error':   'Ooops, algo errado aconteceu.'
            }
        });


        // Used events
        var drEvent = $('#input-file-now').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            console.debug(element); 
            return confirm("Você realmente quer deletar \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            
           <?php 
            // use App\Institution;
            // Institution::deleteImage(); 
            ?>
            alert('Imagem deletada');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        //console.log(drEvent);

        var drDestroy = $('#input-file-now').dropify();
        drDestroy = drDestroy.data('dropify');
           
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {    
                console.log('teste');          
                drDestroy.destroy();
            } else {
                console.log('teste2');  
                drDestroy.init();                 
            }
        })


        // Used events
        var drEvent = $('#input-file-now-custom-1').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Você realmente quer deletar \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('Imagem deletada');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })

        function destroy() {
            return person.age > 10 && person.age < 20
        }
    });
    
</script>


<!-- ============================================================== -->
<!-- Select2 Searching select -->
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>

<script>
$(document).ready(function() {
    $('.js-select2').select2();
});
</script>

    

</body>

</html>
