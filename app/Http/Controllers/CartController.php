<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\address;
use App\Models\food;
use Auth;
use DB;

class CartController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function viewCart(){
        $id = Auth::user()->id;
        $item_list = DB::table('food')
        // ->join('food','cart.food_id','=','food.id')
        ->join('cart','cart.food_id', '=','food.id')
        ->where('cart.user_id','=',$id)
        ->get();
        // dd($item_list);
        $total = 0;
        if ($item_list->isNotEmpty()){
            foreach($item_list as $list)
                $total += $list->quantity*$list->price;
        }
        // dd($item_list->setTotalPrice())
        // return view('main\cart');
        return view('main\cart', compact(
            'item_list','total'
        ));
    }

    public function addCart($id){
        // dd($id);
        $user = Auth::user();
        $food = food::where('id','=', $id)->first();
        $exist_cart = cart::where([
            ['food_id','=',$id],
            ['user_id','=',$user->id]
            ])->first();
            // dd($exist_cart);
        if ($exist_cart){
            $qty = $exist_cart->quantity + 1;
            cart::where('id', '=',$exist_cart->id)->update(['quantity' => $qty]);
        }else{
            $item = new cart;
            $item->name = $food->name;
            $item->user_id = Auth::user()->id;
            $item->food_id = $food->id;
            $item->price = $food->price;
            $item->img = $food->img;
            $item->quantity = 1;
            $item->save();
        }
        // dd($item);
        // return redirect('home');
        return back();
    }

    public static function updateQuantity($id,Request $request){
        
        // dd($id);
        $item = cart::find($id);
        switch ($request->input('action')) {
            case 'increase':
                $qty = $item->quantity + 1;
                cart::where('id', '=',$id)->update(['quantity' => $qty]);
                break;
            case 'decrease':
                $qty = $item->quantity;
                if($qty==1){
                    cart::where('id', '=',$id)->delete();
                    break;
                }else{
                    $qty = $item->quantity - 1;
                    cart::where('id', '=',$id)->update(['quantity' => $qty]);
                    break;
                }
            case 'remove':
                cart::where('id', '=',$id)->delete();
                break;
        }
        return redirect('cart');
    } 

    public function checkout(){
        $user = Auth::user();
        $list_whole = cart::where('user_id','=',$user->id)
        ->get();
        $total = 0;
        if ($list_whole->isNotEmpty()){
            foreach($list_whole as $list)
                $total += $list->quantity*$list->price;
        }
        // return view('main\checkout');
        return view('main\checkout', compact(
            'list_whole','total','user'
        ));
    }
}
