<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class LoginController extends Controller
{
    
    public function registerSave(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->fill($request->all());
        $user->save();
        
        if($user){
            return back()->with('success','success register');
        }else{
            return back()->with('fail','Fail register');
        } 
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }else{
            return back()->with('fail','Wrong password');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('home');
    }

}
