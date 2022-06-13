<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\order;
use App\Models\food;
use App\Models\notice;
use App\Models\store;
use Auth;
use DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function makeOrder(Request $request){
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $store = DB::table('cart')
        ->where('cart.user_id','=',$user->id)
        ->join('food','food.id','=','cart.food_id')
        ->join('store','store.id','=','food.store_id')
        ->get();
        foreach($store as $s){
            $notice = new notice;
            $notice->user_id = $s->id;
            $notice->title = "Bạn có đơn đặt hàng mới!";
            $notice->content = "Bạn có đơn hàng mới từ ".$user->name;
            $notice->status = 2;
            $notice->created_at = Carbon::now();
            $notice->save();
        }

        $cart_list = cart::where('user_id','=',$user->id)
        ->get();
        if($cart_list->isNotEmpty()){
            foreach($cart_list as $item){
                $store = food::where('id','=',$item->food_id)->first();
                // dd($store);
                $order = new order;
                $order->user_id = $user->id;
                $order->food_id = $item->food_id;
                $order->store_id = $store->store_id;
                $order->quantity = $item->quantity;
                $order->discount = null;
                $order->price = $item->price*$item->quantity;
                $order->status = 0;
                $order->payment = 0;
                $order->phone = $request->phone;
                $order->address = $request->address;
                $order->created_at =  Carbon::now();
                // dd($order);
                $order->save();
                cart::where('id', '=',$item->id)->delete();
            }
        }else{
            return redirect('cart');
            // return $request->input();
        }
        return redirect('cart');
    }
}
