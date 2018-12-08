<?php

namespace App\Http\Controllers\Backend;

use Storage;
use Session;
use Request;
use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');

        $blog = Blog::findOrFail($id);

        return view('backend.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $this->authorize('admin');

        $requestData = $request->all();
        

        if (isset($requestData['apagarImagem'])) {
            Storage::delete($requestData['pathImage']);
            unset($requestData['apagarImagem']);
            $requestData['image'] = '';
        }
        unset($requestData['pathImage']);

        if (isset($requestData['apagarImagem_2'])) {
            Storage::delete($requestData['pathImage_2']);
            unset($requestData['apagarImagem_2']);
            $requestData['image_2'] = '';
        }
        unset($requestData['pathImage_2']);
        

        if (isset($requestData['apagarImagem_3'])) {
            Storage::delete($requestData['pathImage_3']);
            unset($requestData['apagarImagem_3']);
            $requestData['image_3'] = '';
        }
        unset($requestData['pathImage_3']);

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            $requestData['image'] = Blog::imageUpload($request, 'image');
        }

        if ($request->hasFile('image_2')) {
            $requestData['image_2'] = Blog::imageUpload($request, 'image_2');
        }
        if ($request->hasFile('image_3')) {
            $requestData['image_3'] = Blog::imageUpload($request, 'image_3');
        }

        $blog->update($requestData);

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editada');

        return redirect()
            ->action('Backend\BlogController@edit', 1)
            ->withInput(Request::only('name'));
    }
}
