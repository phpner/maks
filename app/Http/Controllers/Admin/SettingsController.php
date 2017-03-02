<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;

class SettingsController extends Controller
{


    public function settingsOfSite(){

        return view('admin/settings',['users'=>User::all()]);
    }

    protected function create(Request $data)
    {

        $val =  Validator::make($data->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
           /* 'password' => 'required|min:6|confirmed',*/
        ]);

        if ($val->fails()){
            return response()->view('errors/costomErroesFails',['messages'=> $val]);
            }

     /*    User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/

       return response()->json(['status' => '200', 'users'=>User::all()]);
    }
    public function settingsEditUser(Request $request)
    {

    }
}
