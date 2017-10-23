<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Item;
use App\Photo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use Image;
use Auth;

class ItemController extends Controller
{
    private $thumbnailSize = [175, 175];
    private $photoSize = [640, 480];

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
        $units = Unit::all();
        return view('items.create', [ 'units' => $units ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      /**
      * form validaton
      */
      $this->validate($request, [
        'photo' => 'required',
        'short_description' => 'required',
        'description' => 'required',
        'amount' => 'required|numeric'
      ]);

      $request->merge(['description' => e($request->input('description'))]);

      $item = Auth::user()->items()->create($request->all());

      if($request->hasFile('photo')) {
        foreach ($request->file('photo') as $p) {
          if($p->isValid())
          {
            $this->preparePhoto($item, $p);
          }
        }
      }

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
        $units = Unit::all();
        return view('items.edit', ['item' => $item, 'units' => $units]);
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
      $request->merge(['description' => e($request->input('description'))]);
      $item->update($request->all());

      if($request->hasFile('photo')) {
        foreach ($request->file('photo') as $p) {
          if($p->isValid())
          {
            $this->preparePhoto($item, $p);
          }
        }
      }

      if($request->has('delete_photo'))
      {
        foreach($request->delete_photo as $photoID)
        {
          $p = Photo::find($photoID);
          Storage::delete([$p->thumbnail, $p->photo]);
          $p->delete();
        }
      }

      return redirect(action('ItemController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
      foreach ($item->photos as $p) {
        Storage::delete([$p->thumbnail, $p->photo]);
      }
      $item->delete();
      return $item;
    }

    private function preparePhoto(Item $item, $p)
    {
      $thumbnailPath = 'images/';
      $thumbnailFilename = $item->id . '-' . uniqid() . '-' . time() . '-' . implode('X', $this->thumbnailSize) . '.jpg';
      $thumbnailPath .= $thumbnailFilename;

      $thumbnail = Image::make($p->path())->fit($this->thumbnailSize[0], $this->thumbnailSize[1]);
      $thumbnail->text('SVJX Ukay-Ukay', $this->thumbnailSize[0]/2, $this->thumbnailSize[1]/2, function($font) {
        $font->file(storage_path('app/public/fonts/Capture_it.ttf'));
        $font->size(24);
        $font->color(array(255, 255, 255, 0.2));
        $font->align('center');
        $font->valign('middle');
        $font->angle(rand(0, 90) * (rand(0, 1) ? 1 : -1));
      });
      $thumbnail->save(storage_path('app/public/'.$thumbnailPath));

      $photoPath = 'images/';
      $photoFilename = $item->id . '-' . uniqid() . '-' . time() . '-' . implode('X', $this->photoSize) . '.jpg';
      $photoPath .= $photoFilename;

      $photo = Image::make($p->path())->fit($this->photoSize[0], $this->photoSize[1]);
      $photo->text('SVJX Ukay-Ukay', $this->photoSize[0]/2, $this->photoSize[1]/2, function($font) {
        $font->file(storage_path('app/public/fonts/Capture_it.ttf'));
        $font->size(100);
        $font->color(array(255, 255, 255, 0.2));
        $font->align('center');
        $font->valign('middle');
        $font->angle(rand(0, 90) * (rand(0, 1) ? 1 : -1));
      });
      $photo->save(storage_path('app/public/'.$photoPath));

      $item->photos()->create(['thumbnail' => $thumbnailPath, 'photo' => $photoPath]);
    }

}
