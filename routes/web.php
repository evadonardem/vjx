<?php

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

Route::get('/test', function() {
  $users = App\User::all();
  foreach ($users as $user) {
    $user->api_token = str_random(60);
    $user->save();
  }
});

Route::get('/activate/{email}', function($email) {
  $user = App\User::where('email', '=', $email)->first();
  if(is_object($user)) {
    $user->active = true;
    $user->save();
  }
});

// Item Management
Route::resource('items', 'ItemController');
Route::get('dashboard', 'DashboardController@index');

// Booth
Route::get('/', 'BoothController@index');
Route::get('booth', 'BoothController@index');
Route::get('booth/items/{itemID}', 'BoothController@items');
Route::get('booth/sellers/{userID}/items', 'BoothController@sellerItems');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Profile
Route::resource('profiles', 'ProfileController');
Route::post('changepassword', 'ProfileController@changePassword');
