<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\Models\Item;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('admin/admin');
    }
    public function add_items(Request $request){

        if ($request->isMethod('post')){


            $item = new Item();

            $item->title = $request->title;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->delivery = $request->delivery;
            $item->img_link = $request->file;
            $item->category_id = $request->category_id;

            if (!$item->save()){
                abort('404');
            }
            return redirect('/admin');

        }
        return view('admin/add_items');
    }
}
