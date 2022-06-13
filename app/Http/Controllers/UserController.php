<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\address;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class UserController extends Controller
{
    public function __construct(){
            $this->middleware('auth');
    }

    public function publicUserInfo($id){
        $user = User::find($id);
        return view('user/user-info', compact(
            'user'
        ));
    }

    public function userInfo(){
        $user = Auth::user();
        return view('user/user-info', compact(
            'user'
        ));
    }

    public function updateInfo(Request $request){
        $user = Auth::user();
        $new = User::where('id', '=',$user->id)
        ->update(
            ['name' => $request->name],
            ['phone' => $request->phone],
        );
        if($new){
            return back()->with('success','Đổi thông tin thành công');
        }else{
            return back()->with('fail','Đổi thông tin thất bại');
        } 
    }
}
