@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Blog Editar</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Blog Editar</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            {{-- <form method="get" action="{{action('Backend\BlogController@index')}}">    
                <div class="d-flex m-t-10 justify-content-end">  
                    <button type="submit"  class="btn waves-effect waves-light btn-info">Listar</button> 
                </div>
            </form> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Editar Blog</h4>
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
                        <form action="{{action('Backend\BlogController@update', $blog->id)}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />                
                            <div class="form-body">
                                <h3 class="box-title">Informações Blog</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Título</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="title" value="{{ $blog->title }}" placeholder="" required>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <h4 class="card-title">Imagem</h4>
                                        <small class="form-control-feedback"> Tamanho mínimo 1 x 1 px e máximo 10000 x 10000 px</small>
                                        <input type="file" name="image" id="input-file-now" class="dropify"  data-show-remove="false"
                                            <?php if($blog->image){ ?> data-default-file="{{ asset("storage/blog/$blog->image") }}" <?php } ?>
                                            />
                                        <input type="hidden" name="pathImage" value="blog/<?php echo $blog->image ?>" />
                                        <input type="checkbox" name="apagarImagem" id="basic_checkbox_1" />                                            
                                        <label for="basic_checkbox_1">Apagar Imagem</label>
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Link</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="link" value="{{ $blog->link }}" placeholder="" required>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Categoria</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="category" value="{{ $blog->category }}" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Título</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="title_2" value="{{ $blog->title_2 }}" placeholder="" required>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <h4 class="card-title">Imagem 2</h4>
                                        <small class="form-control-feedback"> Tamanho mínimo 1 x 1 px e máximo 10000 x 10000 px</small>
                                        <input type="file" name="image_2" id="input-file-now" class="dropify"  data-show-remove="false"
                                            <?php if($blog->image_2){ ?> data-default-file="{{ asset("storage/blog/$blog->image_2") }}" <?php } ?>
                                            />
                                        <input type="hidden" name="pathImage_2" value="blog/<?php echo $blog->image_2 ?>" />
                                        <input type="checkbox" name="apagarImagem_2" id="basic_checkbox_2" />                                            
                                        <label for="basic_checkbox_2">Apagar Imagem</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Link 2</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="link_2" value="{{ $blog->link_2 }}" placeholder="" required>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Categoria 2</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="category_2" value="{{ $blog->category_2 }}" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Título 3</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="title_3" value="{{ $blog->title_2 }}" placeholder="" required>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <h4 class="card-title">Imagem 3</h4>
                                        <small class="form-control-feedback"> Tamanho mínimo 1 x 1 px e máximo 10000 x 10000 px</small>
                                        <input type="file" name="image_3" id="input-file-now" class="dropify"  data-show-remove="false"
                                            <?php if($blog->image_3){ ?> data-default-file="{{ asset("storage/blog/$blog->image_3") }}" <?php } ?>
                                            />
                                            <input type="hidden" name="pathImage_3" value="blog/<?php echo $blog->image_3 ?>" />
                                        <input type="checkbox" name="apagarImagem_3" id="basic_checkbox_3" />                                            
                                        <label for="basic_checkbox_3">Apagar Imagem</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Link 3</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="link_3" value="{{ $blog->link_3 }}" placeholder="" required>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Categoria</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="category_3" value="{{ $blog->category_3 }}" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                
                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Texto</label>
                                            <textarea class="form-control" rows="5" name="text" required>{{ $blog->text }}</textarea>
                                        </div>                                        
                                    </div>
                                    <!--/span-->
                                </div>           --}}
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