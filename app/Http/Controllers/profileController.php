<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Auth;
use DB;
class profileController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $user = User::findOrFail(Auth::user()->id)->only(['name', 'username', 'email', 'country', 'gender']);
            $country = DB::table('countries')
                    ->where('code', '=', $user['country'])
                    ->pluck('name', 'code')
                    ->first();
            return view('users.profile')->with(['userInfo' => $user, 'country' => $country]);
        }else{
            return abort(404);
        }
    }

    public function update(Request $request){
                
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'username' =>'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $update = User::find(Auth::user()->id);
        $update->name       = $request->name;
        $update->username   = $request->username;
        $update->email       = $request->email;
        $update->save(); 
        
        return redirect(route('profile'))->with('updated', 'Personal inforamtion updated successfully');
    }
}
