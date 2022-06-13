<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index(){
        $food_list = DB::table('food')
        ->join('category','category.food_id','=','food.id')
        ->inRandomOrder()->get();
        $sale_off_list = DB::table('food')
        ->join('category','category.food_id','=','food.id')
        ->inRandomOrder()->get();
        // dd($food_list);
        return view('welcome', compact(
            'food_list', 'sale_off_list'
        ));
    }

    public function store_page($id){
        $rate_list = DB::table('rate')
        ->join('food','food.id','=','rate.food_id')
        ->join('store','store.id','=','food.store_id')
        ->where('store.id','=',$id)
        ->get();
        $rate_point = floor($rate_list->avg('rate_point') * 2) / 2;
        $food_list_avg = DB::table('rate')
        ->selectRaw('food.id,food.name,food.img,food.price,food_id, avg(rate_point) as average_rate')
        ->groupBy('food_id')
        ->orderBy('average_rate','desc')
        ->join('food','food.id','=','rate.food_id')
        ->join('store','store.id','=','food.store_id')
        ->where('store.id','=',$id)
        ->get();
        // dd($food_list_avg);

        $store = DB::table('store')
        ->where('id','=',$id)->first();
        $food_list = DB::table('store')
        ->join('food', 'store.id', '=', 'food.store_id')
        ->where('store_id', '=', $id)
        ->get();
        $food_list_random =$food_list->random(5);
        $min_price = DB::table('food')
        ->where('store_id','=',$id)
        ->selectRaw('min(price) as price')->first();
        // dd($min_price);
        $max_price = DB::table('food')
        ->where('store_id','=',$id)
        ->selectRaw('max(price) as price')->first();
        // dd($max_price);
        return view ('main/store',compact(
            'store','food_list','food_list_random','min_price','max_price','rate_point','rate_list','food_list_avg'
        ));
    }
    
    public function noticePage(){
        $user = Auth::user();
        $notice_list = DB::table('notice')
        ->where('user_id','=',$user->id)
        ->where('status','=',0)
        ->orWhere('status','=',1)
        ->get();
        if($notice_list){
            foreach($notice_list as $notice){
                DB::table('notice')
                ->where('id', '=',$notice->id)
                ->where('status','=',0)
                ->update(['status' => 1]);
            }
        }
        // dd($notice_list);
        return view('main/notice',compact(
            'notice_list'
        ));
    }

    public function login(){
        return view('main/login');
    }
    public function register(){
        return view('main/register');
    }

    public function loggedIn(){
        $data = ['LoggedUser'=>User::where('id','=',session('LoggedUser'))->first()];
        
        dd($data);
    }

    public function contact(){
        return view('main/contact');
    }

}
