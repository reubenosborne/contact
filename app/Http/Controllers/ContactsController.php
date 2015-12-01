<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Get all the files associated with the retrieved contact
        $contacts = Contact::with('files')->get();

        return $contacts;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact();

        $contact->fill($request->all());

        $contact->save();

        $contact = Contact::where('id', $contact->id)->with('files')->first();

        return $contact;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::where('id', $id)->with('files')->first();

        if (is_null($contact)) {
            return response()->json(['error'=>'No contact found with ID '.$id], 404);
        }

        return $contact;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);

        if (is_null($contact)) {
            return response()->json(['error'=>'No contact found with ID '.$id], 404);
        }

        $contact->fill($request->all());

        $contact->save();

        $contact = Contact::where('id', $contact->id)->with('files')->first();

        return $contact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);

        if (is_null($contact)) {
            return response()->json(['error'=>'No contact found with ID '.$id], 404);
        }

        $contact->delete();

        return $contact;
    }
}
