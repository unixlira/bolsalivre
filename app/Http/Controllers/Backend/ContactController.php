<?php

namespace App\Http\Controllers\Backend;

use Request;
use Session;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return Response
      */
    public function edit($id)
    {
        $this->authorize('admin');

        $contact = Contact::findOrFail($id);

        return view('backend.contacts.edit')
            ->with('contact', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Contact  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ContactRequest $request, $id)
    {
        $this->authorize('admin');

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        //Guarda em uma sessão que a edição ocorreu para apresentar a mensagem no listar.
        Session::flash('action', 'editado');

        return redirect()
            ->action('Backend\ContactController@edit', 1)
            ->withInput(Request::only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
