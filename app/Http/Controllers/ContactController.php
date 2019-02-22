<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {

    }


    public function index()
    {
        $messages = DB::table('contacts')->get();

        return view('contactUs.viewMsgs', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ('hello create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $contact_usDataTable = new Contact;

        $contact_usDataTable->name = $request->form_name;
        $contact_usDataTable->email = $request->form_email;
        $contact_usDataTable->flat_address = $request->form_flat_address;
        $contact_usDataTable->message = $request->form_message;
        $contact_usDataTable->save();
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact_id)
    {
        return view('contactUs.editView', compact('contact_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $contact_id)
    {
        DB::table('contacts')->where('contact_id', $contact_id)->update(array('name' => $request->form_name,
            'email' => $request->form_email,
            'flat_address' => $request->form_flat_address,
            'message' => $request->form_message));

        return redirect('/contactUs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact_id)
    {
        $contact_id->delete();
        return back();

//        /////////2nd way by resources///////
//
//        $messages = Contact::find($contact_id);
//        $messages->delete();
//        return redirect('/contactUs')->with('success','Data Delete');

    }


    public function formReplay(Request $request, Contact $contact_id)
    {
        return view('contactUs.replay', compact('contact_id'));


//        $ContactUS = new Contact;
//
//        $ContactUS->email = $request->form_email;
//        $ContactUS->message = $request->form_message;
//        $ContactUS->save();
//        return back();



    }
}