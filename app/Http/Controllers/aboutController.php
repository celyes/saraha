<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutController extends Controller
{
    //
    public function about(){
        return "about us";
    }

    public function contact(){
        return "Contact us";
    }
}
