<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;
use resonse;

class contactscontroller extends Controller
{
    //
    public function edit($id){
        $data =  contact::find($id);
        return $data;
        // return view('contacts.edit',compact('data'));
  
    }
    public function update(Request $req,$id){
        // return $req->all();
        
        $data =  contact::find($id);
        $data->email = $req->email;
        $data->description = $req->description;
        $data->save();

        return $data;
        // return view('contacts.edit',compact('data'));
  
    }
    public function index(){
        $data =  contact::get();
        return $data;
       
    }
    public function show($id)
    {
        $contact = contact::find($id);
       return $contact;
    }
    public function create()
    {
        return view('contacts.create');
    }
    public function store(Request $req){
        // return response()->json([$req->all()]);
        $contact = new contact;
        $contact->email = $req->email;
        $contact->description = $req['description'];
        $contact->save();
        return redirect('/home')->with('success','stored successfully');
    }
    public function destroy(Request $req)
    {
        $id = $req->contact_id;
        $contact = contact::find($id);
        $contact->delete();
        return response()->json('contact deleted');
        // return view('contacts.create');
    }
}
