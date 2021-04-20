<?php

namespace App\Http\Controllers\mamafua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class mamafuacontroller extends Controller
{
    //
    public function index(){
        $mamafuas = User::where('role','mamafua');
        return $mamafuas;
        return view('mamafua.index');
    }
}
