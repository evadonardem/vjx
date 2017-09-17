<?php

namespace App\Http\Controllers;

use App\User;
use App\Item;
use Illuminate\Http\Request;

class BoothController extends Controller
{
    public function index()
    {
      $items = Item::where('sold_at', '=', NULL)->orderBy('id', 'desc')->get();
      return view('booth.index', array('items' => $items));
    }

    public function items($itemID)
    {
      $item = Item::find($itemID);
      return view('booth.items.index', array('item' => $item));
    }

    public function sellerItems($userID)
    {
      $seller = User::find($userID);
      $sold_items = $seller->items->whereNotIn('sold_at', [NULL])->count();
      $items = $seller->items->where('sold_at', NULL);
      return view('booth.sellers.items.index', array('seller' => $seller, 'items' => $items, 'sold_items' => $sold_items));
    }
}
