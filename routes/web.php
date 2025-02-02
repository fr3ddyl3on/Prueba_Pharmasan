<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Pruebas
Route::get('/test', function () {
    $user = User::find(3);
   // $user->roles()->sync([2]);
   Gate::authorize('haveaccess','role.show');
   return $user;
    //return $user->havePermission('role.create');
});

Route::resource('/role', 'RoleController')->names('role');

Route::resource('/user', 'UserController', ['except'=>['create','store']])->names('user');
Route::resource('/client', 'ClientController')->names('client');
Route::resource('/report', 'ReportController',['except'=>['create','store','show','update','destroy','edit']])->names('report');