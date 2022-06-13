<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;
use App\Models\User;
use App\Models\order;
use App\Models\bill;
use App\Models\notice;
use App\Models\category;
use App\Models\rate;
use Auth;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function dashboard(){
        $user = Auth::user();
        $order_list = order::where([
            ['store_id','=',$user->store->id],
            ['status','=',0]
            ])
        ->get();

        $bill_list = bill::where('store_id','=',$user->store->id)
        ->get();
        $total_income = 0;
        $today_income = 0;
        $total_rate = 0;
        $rate_list = DB::table('rate')
        ->join('food','food.id','=','rate.food_id')
        ->join('store','store.id','=','food.store_id')
        ->where('store.id','=',$user->store->id)
        ->get();
        $rate_point = round($rate_list->avg('rate_point'), 2);
        // $top_5_rate = $rate_list->orderBy('id', 'DESC');
        $top_5_rate = DB::table('rate')
        ->selectRaw('food.name,food.img,food.price,food_id, avg(rate_point) as average_rate')
        ->groupBy('food_id')
        ->orderBy('average_rate','desc')
        ->join('food','food.id','=','rate.food_id')
        ->join('store','store.id','=','food.store_id')
        ->where('store.id','=',$user->store->id)
        ->paginate(5);
        // dd($top_5_rate);

        foreach($bill_list as $bill){
            $total_income += $bill->cash;
            if($bill->created_at->format('Y-m-d') == Carbon::now()->format('Y-m-d')){
                $today_income += $bill->cash;
            }
        }

        return view('admin/dashboard',compact(
            'user','order_list','total_income','today_income','rate_point','top_5_rate'
        ));
    }

    public function foodPage(){
        $user = Auth::user();
        $food_list = $user->store->food;
        // $food_list = food::where('store_id','=',$id->id)
        // ->paginate(6);
        $food_list_update = food::where('store_id','=',$user->id)
        ->orderBy('id','DESC')->paginate(5);
        // dd($food_list_update);
        return view('admin/main/food',compact(
            'user','food_list','food_list_update'
        ));
    }

    public function foodEdit($id){
        $user = Auth::user();
        $food = food::where('id','=',$id)
        ->first();
        return view('admin/main/food-edit',compact(
            'user','food'
        ));
    }

    public function foodUpdate($id, Request $request){
        $request->validate([
            'name' => 'required',
            'img' => 'required',
            'price' => 'required',
        ]);
        switch ($request->input('action')) {
            case 'update':
                food::where('id', '=',$id)
                ->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'img' => $request->img,
                ]);
                break;
            case 'back':    
                return redirect('admin/food');
        }
        return redirect('admin/food');
    }

    public function foodAddView(){
        $user = Auth::user();
        return view('admin/main/food-add',compact(
            'user'
        ));
    }

    public function foodAdd(Request $request){
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'img' => 'required',
            'price' => 'required',
        ]);
        switch ($request->input('action')) {
            case 'update':
                $food = new food;
                $food->name = $request->name;
                $food->price = $request->price;
                $food->img = $request->img;
                $food->store_id = $user->id;
                $food->created_at = Carbon::now();
                $food->save();
                break;
            case 'back':    
                return redirect('admin/food');
        }
        return redirect('admin/food');
    }

    public function orderPage(){
        $user = Auth::user();
        $order_list = order::where('store_id','=',$user->store->id)
        // ->groupBy('created_at')
        ->get();
        // dd($order_list);
        return view('admin/main/order',compact(
            'user','order_list'
            // 'order_list'
        ));
    }

    public function orderInfo($id){
        $user = Auth::user();

        $info_order = DB::table('food')
        // ->select('order.*')
        ->join('order', 'order.food_id', '=', 'food.id')
        ->where([
            ['order.created_at','=',$id],
            ['order.store_id','=',$user->id_store_owner],
            ])
        ->get();
        // dd($info_order);    
        return view('admin/main/order-info',compact(
            'user','info_order'
        ));
    } 
    public function orderAccept(Request $request){
        $user = Auth::user();
        switch ($request->input('action')) {
            case 'update':
                $request->validate([
                    'order' => 'required'
                ]);
                $customer = DB::table('order')
                ->where('order.id','=',$request->order)
                ->join('users','users.id','=','order.user_id')
                ->first();
                // dd($request->input());
                $notice = new notice;
                $notice->user_id = $customer->id;
                $notice->title = "Đơn hàng của bạn đã được giao!";
                $notice->content = "Đơn hàng của bạn từ ".$user->store()->first()->name." đã được giao ";
                $notice->status = 0;
                $notice->created_at = Carbon::now();
                // dd($notice);
                $notice->save();
                
                $order_info = "<h3>Hóa đơn của: ".$customer->name."<h3><br />";
                // $order_info = "&lt;h3&gt;H&oacute;a đơn của: ".$customer->name."<h3>";
                $total = 0;
                $time_now = Carbon::now();
                foreach($request->input('order') as $order){
                    $one = DB::table('order')
                    ->where('order.id', '=',$order)
                    ->join('food','food.id','=','order.food_id')
                    ->get();
                    $total += $one->first()->price*$one->first()->quantity;
                    $order_info = $order_info."<p>".$one->first()->name." x ".$one->first()->quantity.": ".number_format($one->first()->price*$one->first()->quantity)." vnđ</p><br />";

                    order::where('id', '=',$order)->update(['status' => 1]);
                }
                $order_info = $order_info."<p>Tổng cộng:".number_format($total ?? '333', 0, '', ',')." vnđ</p><p><br />Thời gian mua hàng ".$time_now."</p>";
                
                $bill = new bill;
                $bill->user_id = $customer->user_id;
                $bill->store_id = $user->id_store_owner;
                $bill->order_info = $order_info;
                $bill->created_at = $time_now;
                $bill->cash = $total;
                // dd($bill);
                $bill->save();
                break;
            case 'back':    
                return redirect('admin/order');
        }
        return redirect('admin/order');
    }
    
    public function billPage(){
        $user = Auth::user();
        $bill_list = bill::where('store_id','=',$user->id)
        ->get();
        return view('admin/main/bill', compact(
            'user','bill_list'
        ));
    }
    public function billInfo($id){
        $user = Auth::user();
        $b = bill::where('id','=',$id)
        ->first();
        // dd($bill->user_id);
        return view('admin/main/bill-info', compact(
            'user','b'
        ));
    }

    public function categoryPage(){
        $user = Auth::user();
        $food_list = $user->store->food;
        $category_list = DB::table('category')
        ->groupBy('type')
        ->get();
        return view('admin/main/add-category',compact(
            'user','food_list','category_list'
        ));
    }

    public function addCategory(Request $request){
        // dd($request->input());
        $request->validate([
            'f_id' => 'required',
            'category' => 'required',
        ]);
        $lowerCat = strtolower($request->category);
        foreach($request->f_id as $f){
            $data = new category;
            $data->food_id = $f;
            $data->type = $lowerCat;

            $exist = DB::table('category')
            ->where([
                ['food_id','=',$f],
                ['type','=',$lowerCat]
            ])
            ->first();
            if (!$exist){
                $data->save();
            }
        }
        return redirect('admin/food');
    }

    public function searchPage(Request $request){
        $user = Auth::user();
        $request->validate([
            'dayStart' => 'required',
            'dayEnd' => 'required|after:dayStart',
        ]);
        // dd($request->input());
        $bill_list = DB::table('bill')
        ->where('store_id','=', $user->store->id)
        ->whereBetween('created_at',array($request->dayStart,$request->dayEnd))
        ->orderBy('created_at','desc')
        ->get();
        // dd($bill_list);
        return view('admin/main/search-result',compact(
            'user','bill_list'
        ));
    }
}
