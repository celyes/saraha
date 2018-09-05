<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $messages = DB::table('messages')
        ->where('receiver', '=', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('home', compact('messages'));
    }
}
