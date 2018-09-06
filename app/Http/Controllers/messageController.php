<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
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
            "body" => "required|min:15|max:1500"
        ]);
        DB::table('messages')->insert([
            'body'      => $request->body,
            'address'   => $request->getClientIp(),
            'receiver'  => $user,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        return redirect()->back()->with('sent', 'Your message has been submitted successfully !'); 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message, $id)
    {
        //
        $message = Message::find($id);
        $message->delete();
        return back()->with('deleted', 'Message has been deleted successfully');
    }
}