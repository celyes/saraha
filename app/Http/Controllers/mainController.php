<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class mainController extends Controller
{
    //
    public function index(Request $request, $username){
        $user = DB::table('users')->where('username', $username)->first();
        return view('users.show', ['creds'=>$user]);
    }
}
