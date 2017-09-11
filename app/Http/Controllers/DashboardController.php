<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
      $items = Item::orderBy('id', 'desc')->get();
      return view('dashboard.index', array('items' => $items));
    }
}
