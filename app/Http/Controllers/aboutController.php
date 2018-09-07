<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutController extends Controller
{
    //
    public function about(){
        return view('about');
    }

    public function contact(){
        return "Contact us";
    }
}
