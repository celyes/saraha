<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\messageRequest; 
use App\User;
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

    public function update(messageRequest $request){
                
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
        
        return redirect(route('profile'))->with('updated', 'Basic inforamtion updated successfully');
    }
    public function updateAdditionals(Request $request){
        $validate = $request->validate([
            'country'   =>'required|string',
            'gender'    =>'required|string|max:6'
        ]);
        $update = User::find(Auth::user()->id);
        $update->country = $request->country;
        $update->gender = $request->gender;
        $update->save();        
        return redirect(route('profile'))->with('updated', 'Personal inforamtion updated successfully');
    }
    public function updateSecurity(Request $request){
        $validate = $request->validate([
            'password'   =>'required|string|min:6|confirmed',
        ]);
        if(Hash::check($request->password, Auth::user()->password)){
            return redirect(route('profile'))->with('failed', 'Please enter the correct password');
        }
        $update = User::find(Auth::user()->id);
        $update->password = Hash::make($request->password);
        $update->save();
        return redirect(route('profile'))->with('updated', 'Password changed successfully');
    }
    
}
