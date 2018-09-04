<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use DB;
class messageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
    public function index(Request $request, $username){
        $user = DB::table('users')
        ->select('id', 'username')
        ->where('username', $username)
        ->first();
        if(!$user){
            return abort(404);
        }
        return view('users.show')->with(['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $user)
    { 
        $valid = $request->validate([
            "body" => "required|min:15|max:500"
        ]);
        DB::table('messages')->insert([
            'body'      => $request->body,
            'address'   => $request->getClientIp(),
            'receiver'  => $user
        ]);
        return redirect()->back()->with('sent', 'Your message has been submitted successfully !'); 
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
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}