<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->action('Backend\UserController@index');
});

//Auth::routes();

// Authentication Routes...
$this->get('admin', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('admin', 'Auth\LoginController@login');
$this->post('admin/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// $this->get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('admin/register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('admin/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('admin/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Backend')->group(function () {
    Route::get('user', 'UserController@index');
    Route::get('user/create', 'UserController@create');
    Route::post('user/store', 'UserController@store');
    Route::get('user/edit/{id}', 'UserController@edit');
    Route::post('user/update/{id}', 'UserController@update');
    Route::get('user/delete/{id}', 'UserController@destroy');
    Route::get('user/export', 'UserController@export');

    //PostController
    Route::get('posts', 'PostController@index');

    //PermissionController
    Route::get('permissions', 'PermissionController@index');
    Route::get('permission/create', 'PermissionController@create');
    Route::post('permission/store', 'PermissionController@store');
    Route::get('permission/edit/{id}', 'PermissionController@edit');
    Route::post('permission/update/{id}', 'PermissionController@update');
    Route::get('permission/delete/{id}', 'PermissionController@destroy');
    Route::get('permission/{id}/roles', 'PermissionController@roles');

    //RolesController
    Route::get('roles', 'RoleController@index');
    Route::get('role/create', 'RoleController@create');
    Route::post('role/store', 'RoleController@store');
    Route::get('role/edit/{id}', 'RoleController@edit');
    Route::post('role/update/{id}', 'RoleController@update');
    Route::get('role/delete/{id}', 'RoleController@destroy');
    Route::get('role/{id}/permissions', 'RoleController@Permissions');

    //CategoriesController
    Route::get('categories', 'CategoryController@index');
    Route::get('category/create', 'CategoryController@create');
    Route::post('category/store', 'CategoryController@store');
    Route::get('category/edit/{id}', 'CategoryController@edit');
    Route::post('category/update/{id}', 'CategoryController@update');
    Route::get('category/delete/{id}', 'CategoryController@destroy');

    //SubcategoriesController
    Route::get('subcategories', 'SubcategoryController@index');
    Route::get('subcategory/create', 'SubcategoryController@create');
    Route::post('subcategory/store', 'SubcategoryController@store');
    Route::get('subcategory/edit/{id}', 'SubcategoryController@edit');
    Route::post('subcategory/update/{id}', 'SubcategoryController@update');
    Route::get('subcategory/delete/{id}', 'SubcategoryController@destroy');

    //ShiftController
    Route::get('shifts', 'ShiftController@index');
    Route::get('shift/create', 'ShiftController@create');
    Route::post('shift/store', 'ShiftController@store');
    Route::get('shift/edit/{id}', 'ShiftController@edit');
    Route::post('shift/update/{id}', 'ShiftController@update');
    Route::get('shift/delete/{id}', 'ShiftController@destroy');

    //ShiftController
    Route::get('type_of_trainings', 'TypeOfTrainingController@index');
    Route::get('type_of_training/create', 'TypeOfTrainingController@create');
    Route::post('type_of_training/store', 'TypeOfTrainingController@store');
    Route::get('type_of_training/edit/{id}', 'TypeOfTrainingController@edit');
    Route::post('type_of_training/update/{id}', 'TypeOfTrainingController@update');
    Route::get('type_of_training/delete/{id}', 'TypeOfTrainingController@destroy');

    //neighborhoodController
    Route::get('neighborhoods', 'NeighborhoodController@index');
    Route::get('neighborhood/create', 'NeighborhoodController@create');
    Route::post('neighborhood/store', 'NeighborhoodController@store');
    Route::get('neighborhood/edit/{id}', 'NeighborhoodController@edit');
    Route::post('neighborhood/update/{id}', 'NeighborhoodController@update');
    Route::get('neighborhood/delete/{id}', 'NeighborhoodController@destroy');

    //FaqController
    Route::get('faqs', 'FAQController@index');
    Route::get('faq/create', 'FAQController@create');
    Route::post('faq/store', 'FAQController@store');
    Route::get('faq/edit/{id}', 'FAQController@edit');
    Route::post('faq/update/{id}', 'FAQController@update');
    Route::get('faq/delete/{id}', 'FAQController@destroy');

    //HowItWorksController
    Route::get('how_it_works', 'HowItWorksController@index');
    Route::get('how_it_work/create', 'HowItWorksController@create');
    Route::post('how_it_work/store', 'HowItWorksController@store');
    Route::get('how_it_work/edit/{id}', 'HowItWorksController@edit');
    Route::post('how_it_work/update/{id}', 'HowItWorksController@update');
    Route::get('how_it_work/delete/{id}', 'HowItWorksController@destroy');

    //WorkWhithUsController
    Route::get('work_with_us/edit/{id}', 'WorkWithUsController@edit');
    Route::post('work_with_us/update/{id}', 'WorkWithUsController@update');

    //ContactController
    Route::get('contact/edit/{id}', 'ContactController@edit');
    Route::post('contact/update/{id}', 'ContactController@update');

    //SocialController
    Route::get('social/edit/{id}', 'SocialController@edit');
    Route::post('social/update/{id}', 'SocialController@update');

    //InstitutionController
    Route::get('institutions', 'InstitutionController@index');
    Route::get('institution/create', 'InstitutionController@create');
    Route::post('institution/store', 'InstitutionController@store');
    Route::get('institution/edit/{id}', 'InstitutionController@edit');
    Route::post('institution/update/{id}', 'InstitutionController@update');
    Route::get('institution/delete/{id}', 'InstitutionController@destroy');
    Route::get('institution/{id}/bolsas', 'InstitutionController@bolsas');

    //ScholarshipController
    // Route::get('institution/{id}/bolsas', 'ScholarshipController@create');
    Route::get('institution/{id}/shift/{shift_id}/bolsas', 'ScholarshipController@create');
    Route::post('institution/store/bolsas', 'ScholarshipController@store');
    // Route::get('institution/{id}/bolsas/edit', 'ScholarshipController@edit');
    Route::get('institution/{id}/shift/{shift_id}/bolsas/edit', 'ScholarshipController@edit');
    Route::post('institution/bolsas/update', 'ScholarshipController@update');

    //InstitutionController
    Route::get('products', 'ProductController@index');
    Route::get('product/create', 'ProductController@create');
    Route::post('product/store', 'ProductController@store');
    Route::get('product/edit/{id}', 'ProductController@edit');
    Route::post('product/update/{id}', 'ProductController@update');
    Route::get('product/delete/{id}', 'ProductController@destroy');

    //CityController
    Route::get('cities', 'CityController@index');
    Route::get('city/create', 'CityController@create');
    Route::post('city/store', 'CityController@store');
    Route::get('city/edit/{id}', 'CityController@edit');
    Route::post('city/update/{id}', 'CityController@update');
    Route::get('city/delete/{id}', 'CityController@destroy');

    //TagController
    Route::get('tags', 'TagController@index');
    Route::get('tag/create', 'TagController@create');
    Route::post('tag/store', 'TagController@store');
    Route::get('tag/edit/{id}', 'TagController@edit');
    Route::post('tag/update/{id}', 'TagController@update');
    Route::get('tag/delete/{id}', 'TagController@destroy');

    //TestimonyController
    Route::get('testimonies', 'TestimonyController@index');
    Route::get('testimony/create', 'TestimonyController@create');
    Route::post('testimony/store', 'TestimonyController@store');
    Route::get('testimony/edit/{id}', 'TestimonyController@edit');
    Route::post('testimony/update/{id}', 'TestimonyController@update');
    Route::get('testimony/delete/{id}', 'TestimonyController@destroy');

    //Blog
    Route::get('blog/edit/{id}', 'BlogController@edit');
    Route::post('blog/update/{id}', 'BlogController@update');

    //OrderController
    Route::get('orders', 'OrderController@index');
    Route::get('order/create', 'OrderController@create');
    Route::post('order/store', 'OrderController@store');
    Route::get('order/edit/{id}', 'OrderController@edit');
    Route::post('order/update/{id}', 'OrderController@update');
    Route::get('order/delete/{id}', 'OrderController@destroy');

    //ReportController
    Route::get('reports', 'ReportController@index');
    Route::post('report/export', 'ReportController@ordersExport');
    Route::post('report/exportInstitutions', 'ReportController@institutionsExport');

    // //UserController
    // Route::get('users', 'Painel\UserController@index');
    // Route::get('user/{id}/roles', 'Painel\UserController@Roles');

    // //PainelController
    //     Route::get('/', 'Painel\PainelController@index');
});

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'indexController@show');
    Route::get('contato', 'contatoController@show');
    Route::get('instituicoes', 'pageListaInstituicoesController@show');
    Route::get('busca/{slug}', 'pageBuscaController@show');
    Route::get('busca', 'pageBuscaController@busca');
    Route::get('instituicao/{inst_slug}/{cat_slug}/{subcat_slug}', 'singleInstituicaoController@show');
    Route::post('adiciona-bolsa', 'singleInstituicaoController@store');

    Route::get('cadastro', 'pageCadastroController@index');
    Route::post('cadastro/inserir', 'pageCadastroController@store');
    Route::get('cursos', 'pageCursosController@index');
    Route::get('quem-somos', 'pageQuemSomosController@index');
    Route::get('seja-um-parceiro', 'pageSejaUmParceiroController@index');
    Route::get('clube', 'pageClubeController@index');
    Route::get('passo-a-passo', 'pagePassoAPassoController@index');
    Route::get('termos-de-uso-e-condicoes', 'pageTermosDeUsoECondicoesController@index');
    Route::get('regras-do-programa', 'pageRegrasDoProgramaController@index');

    //RegistroUsuario no front
    Route::post('registro', 'PedidoController@userStore');

    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@authenticate');

    Route::get('minha-conta', 'MinhaContaController@index');
    Route::post('minha-conta', 'MinhaContaController@update');

    Route::get('pedido', 'PedidoController@index');
    Route::get('pedido-remove/{rowId}', 'PedidoController@removeBolsaCarrinho');
    Route::get('pedido-etapa-2', 'PedidoController@indexEtapa2');
    Route::post('pedido/inserir', 'PedidoController@store');

    Route::get('pedido-etapa-3', 'PedidoController@indexEtapa3');
    Route::post('pagamento', 'PedidoController@pagamento');

    Route::get('pedido-pagamento', 'PedidoController@indexPagamento');
    Route::get('pedido-pagamento-resposta', 'PedidoController@indexPagamentoResposta');

    Route::get('minha-conta', 'MinhaContaController@index');
    Route::get('CPM/{order}', 'MinhaContaController@geraCPM');

    //email
});

Route::get('/send/email', 'Frontend\PedidoController@mail');
