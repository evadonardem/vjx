<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use Image;
use Auth;

class ItemController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Auth::user()->items->where('sold_at', NULL);
        return view('items.index', array('items' => $items));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      if($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $file = $request->file('photo');
      }

      if(!isset($file) || empty($file)) return redirect(action('ItemController@index'));

      $thumbnailPath = 'images/';
      $thumbnailFilename = uniqid() . '-' . time() . '-' . Auth::user()->id . '-200X200.jpg';
      $thumbnailPath .= $thumbnailFilename;

      $thumbnail = Image::make($request->photo->path())->fit(200);
      $thumbnail->text('SVJX Ukay-Ukay', 100, 100, function($font) {
        $font->file(storage_path('app/public/fonts/Capture_it.ttf'));
        $font->size(24);
        $font->color(array(255, 255, 255, 0.2));
        $font->align('center');
        $font->valign('middle');
        $font->angle(rand(0, 90) * (rand(0, 1) ? 1 : -1));
      });
      $thumbnail->save(storage_path('app/public/'.$thumbnailPath));

      $imagePath = 'images/';
      $imageFilename = uniqid() . '-' . time() . '-' . Auth::user()->id . '-800X600.jpg';
      $imagePath .= $imageFilename;

      $image = Image::make($request->photo->path())->fit(800, 600);
      $image->text('SVJX Ukay-Ukay', 400, 300, function($font) {
        $font->file(storage_path('app/public/fonts/Capture_it.ttf'));
        $font->size(100);
        $font->color(array(255, 255, 255, 0.2));
        $font->align('center');
        $font->valign('middle');
        $font->angle(rand(0, 90) * (rand(0, 1) ? 1 : -1));
      });
      $image->save(storage_path('app/public/'.$imagePath));

      $request->merge(['description' => e($request->input('description'))]);

      Auth::user()->items()->create(array_merge($request->all(), ['thumbnail_path' => $thumbnailPath, 'image_path' => $imagePath]));
      return redirect(action('ItemController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
      Storage::delete([$item->thumbnail_path, $item->image_path]);
      $item->delete();
      return $item;
    }

    public function test()
    {
      return Auth::user()->items;
    }

}
