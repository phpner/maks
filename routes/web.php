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


Route::get('/get/select', 'IndexController@get_items_by_select');

Route::get('/admin', ['uses' =>'Admin\AdminController@index', 'as' => 'admin']);

Route::group(['prefix' => 'admin'],function (){
    //getting for AJAX
    Router::match(['get', 'post'],'add_items',['uses' => 'Admin\AdminController@add_items', 'as' => 'add_items']);

    //delete an item
    Router::get('del_item/{id}',['uses' => 'Admin\AdminController@del_item', 'as' => 'del_item']);

    //edite item
    Router::get('edit_item/{id}',['uses' => 'Admin\AdminController@edit_item', 'as' => 'edit_item']);

    //update_item
    Router::post('update_item/{id}',['uses' => 'Admin\AdminController@update_item', 'as' => 'update_item']);

    //settings
    Router::get('settings',['uses' => 'Admin\SettingsController@settingsOfSite', 'as' => 'settings']);

    Router::post('create',['uses' => 'Admin\SettingsController@create', 'as' => 'create']);

    //edit user from admin
    Router::post('settingsEditUser',['uses' => 'Admin\SettingsController@settingsEditUser', 'as' => 'create']);
});
