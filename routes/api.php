<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/sold/{itemID}', function(Request $request, $itemID) {
  $item = $request->user()->items
    ->where('id', $itemID)
    ->where('sold', 0)
    ->first();

  if(!is_object($item)) return array();

  $item->sold_at = date('Y-m-d H:i:s');
  $item->save();
  return $item;
});

// public
Route::middleware('api')->get('/get_sold_items_today', function(Request $request) {
  $items = App\Item::with('User')
    ->where('sold_at', '>=', date('Y-m-d 00:00:00'))
    ->where('sold_at', '<=', date('Y-m-d 23:59:59'))
    ->orderBy('sold_at', 'desc')
    ->get();
  return $items;
});
