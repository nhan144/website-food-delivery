<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;
use Auth;

class AddressController extends Controller
{
    public function __construct(){
            $this->middleware('auth');
    }

    public function userAddress(){
        $user = Auth::user();
        $address_list = address::where('user_id','=',$user->id)
        ->get();
        return view('user/user-address', compact(
            'user','address_list'
        ));
    }

    public function saveAddress(Request $request){
        $id = Auth::user();
        $request->validate([
            'name' => 'required',
            'address' => 'required|unique:address',
        ]);
        $address = new address;
        $address->user_id = $id->id;
        $address->name = $request->name;
        $address->address = $request->address;
        $address->save();
        if($address){
            return back()->with('success','success register');
        }else{
            return back()->with('fail','Fail register');
        }

    }

    public function removeAddress(Request $request){
        $id = $request->input('action');
        address::where('id', '=',$id)->delete();
        return back();
    }
}
