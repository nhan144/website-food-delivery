<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;
use DB;

class SearchController extends Controller
{
    public function search(Request $request){
        $search_list = DB::table('food')
        ->where('name', $request->text)
        ->orWhere('name', 'like', '%' . $request->text . '%')
        ->get();
        $text = $request->text;

        $search_list_category = DB::table('food')
        ->join('category','category.food_id','=','food.id')
        ->where('category.type','like','%'.$request->text .'%')
        ->get();
        // dd($search_list);

        return view('main/search',compact(
            'search_list','text', 'search_list_category'
        ));
    }
}
