<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Item;
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
        $items = Item::where('category_id','=', 1)->paginate(3);
        return view('index', ['items' => $items]);
    }
    public function get_items_pagination()
    {
        $items = Item::paginate(3);
        return response()
            ->view('layouts/post', ['items' => $items], 200);

    }
    public function get_items_by_select(Request $request){

            $items = Item::where('category_id', $request->id)->paginate(1);
            return response()->view('layouts/post_select', ['items' => $items], 200);

    }
}
