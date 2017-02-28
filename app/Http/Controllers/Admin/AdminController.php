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

        $count = Item::all()->count();
        $item = Item::orderby('id','desc')->paginate(10);

        return view('admin/status',['items' => $item,'count' => $count]);
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

    public function edit_item(Request $request){

        $edit = Item::find($request->id);

        return view('admin/edit_item',['items'=> $edit]);

    }
    public function del_item(Request $request){

        $del = Item::find($request->id);

        if ($del->delete()){

            return redirect()->route('admin');
        }
    }
    public function update_item(Request $request){

        $update = Item::where('id',$request->id)->firstOrFail();

        $update->title = $request->title;
        $update->description	 = $request->description	;
        $update->price = $request->price;
        $update->img_link = $request->file;
        $update->category_id = $request->category_id;

        if ($update->save()){
            return redirect()->route('admin');
        }

    }
}
