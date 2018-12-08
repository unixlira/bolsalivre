<?php

namespace App\Http\Controllers\Backend;

use Request;
use Session;
use App\FAQ;
use App\Http\Controllers\Controller;
use App\Http\Requests\FAQRequest;

class FAQController extends Controller
{
    private $faq;

    public function __construct(FAQ $faq)
    {
        $this->middleware('auth');
        $this->faq = $faq;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('admin');

        $faqs = $this->faq->all();

        return view('backend.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin');

        return view('backend.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(FAQRequest $request)
    {
        $this->authorize('admin');

        $faq = new FAQ;
        FAQ::create($request->all());

        //Guarda em uma sessão que a inserção ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'criada');

        return redirect()
            ->action('Backend\FAQController@index')
            ->withInput(Request::only('name'));
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  */
    // public function show($id)
    // {
    //     $user = User::findOrFail($id);
    //     if(empty($user)) {
    //         return "Esse usuário não existe";
    //     }
    //     return view('backend.faqs.detalhes')
    //         ->with('user', $user);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('admin');

        $faq = FAQ::findOrFail($id);

        return view('backend.faqs.edit')
            ->with('faq', $faq);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FAQRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(FAQRequest $request, $id)
    {
        $this->authorize('admin');

        $faq = FAQ::findOrFail($id);
        $faq->update($request->all());

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editada');

        return redirect()
            ->action('Backend\FAQController@index')
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');

        $faq = FAQ::find($id);
        $faq->delete();

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'deletada');

        return redirect()
            ->action('Backend\FAQController@index');
    }
}
