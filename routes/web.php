<?php
use Illuminate\Routing\Router;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'IndexController@index');

Route::get('/get', 'IndexController@get_items_pagination');

Route::post('/get/select', 'IndexController@get_items_by_select');

Route::get('/admin', ['uses' =>'Admin\AdminController@index', 'as' => 'admin']);

Route::group(['prefix' => 'admin'],function (){

    Router::match(['get', 'post'],'add_items',['uses' => 'Admin\AdminController@add_items', 'as' => 'add_items']);
});
