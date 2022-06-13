<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\favorite;
use Auth;
use DB;

class FavoriteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addFavorite($id){
        $user = Auth::user();

        $item = new favorite;
        $item->user_id = $user->id;
        $item->food_id = $id;
        $item->save();
        return redirect('home');       
    }

    public function removeFavorite($id, Request $request){
        // return $request->input();
        $user = Auth::user();
        favorite::where([
            ['user_id', '=',$user->id],
            ['food_id', '=',$id]
            ])->delete();
        return redirect('favorite');
    }

    public function viewFavorite(){
        $user = Auth::user();
        $favorite_list = favorite::where('user_id','=',$user->id)
        ->join('food', 'favorite.food_id', '=', 'food.id')
        ->get();
        $favorite_food = DB::table('favorite')
        ->where('favorite.user_id','=',$user->id)
        ->join('food','food.id','=','favorite.food_id')
        ->get();
        $favorite_store = DB::table('food')
        ->join('store','store.id','=','food.store_id')
        ->get();
        // dd($favorite_store);
        return view('main/favorite',compact(
            'user','favorite_list','favorite_store','favorite_food'
        ));
    }
}
