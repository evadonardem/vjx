<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $fillable = [
    'thumbnail_path',
    'image_path',
    'description',
    'amount',
    'unit'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

}
