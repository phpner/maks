<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Item;
use App\Models\Setting;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $settings = Setting::where("id", 3)->get();
        $items = Item::orderby('order_item')->paginate(8);
        return view('index', ['items' => $items,'setting' => $settings]);
    }

    public function get_items_by_select(Request $request){

        //Обработка Ajax запроса
              if ($request->id == 0){
                  $items = Item::orderby('order_item')->paginate(8);
              }else{
                  $items = Item::where('category_id',$request->id)->orderby('order_item')->paginate(8);
              }


            return response()->view('layouts/post_select', ['items' => $items], 200);

    }
}
