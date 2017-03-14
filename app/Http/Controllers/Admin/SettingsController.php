<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use App\Models\Setting;
use App\Models\Item;

class SettingsController extends Controller
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settingsOfSite()
    {
        $settings = Setting::all();
        return view('admin/settings',['users'=>User::all(),'settings' => $settings ]);
    }

    public function getSettings()
    {
        $settings = Setting::all();
        view('layouts/header',['settings' => $settings]);
    }

    public function settingsSaveHeaderImg(Request $request)
    {
            $header =  Setting::where('id',3)->update([
                'header' => $request->img,
                'logo' => $request->logo]);
            return 200;

    }

    public function saveOrderFromStatus(Request $request)
    {                
            parse_str($request->ser, $arr);
            $order = 0;
            foreach ($arr['item'] as $k) {
                Item::where('id',"=", (int) $k)->update(["order_item" => $order]);
                 $order++; 
            }                       
    }
    public function saveInfoSite(Request $request){
        $fileName = false;
        if(Input::hasFile('pricelist'))
        {
        $fileExt = Input::file('pricelist')->getClientOriginalExtension();
            $fileName = Input::file('pricelist')->getClientOriginalName();
            \Illuminate\Support\Facades\Request::file('pricelist')
                                         ->move(public_path().'/priceList', $fileName);    
        }
       if ($fileName == false)
        {
            $fileName =  \Illuminate\Support\Facades\DB::table('settings')
                                     ->select('pricelist')
                                     ->where('id', '=', 3)
                                     ->get();
        }
       $set = Setting::where('id',3)->update([
            'email'=> $request->email,
             "tel"=> $request->tel,
             "mode"=> $request->mode,
             "textunder" => $request->textunder,
             "pricelist" => $fileName
             ]);
        return redirect()->back();
    }
}
