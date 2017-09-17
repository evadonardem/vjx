<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $fillable = [
    'thumbnail_path',
    'image_path',
    'short_description',
    'description',
    'amount',
    'unit_id'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function unit()
  {
    return $this->belongsTo('App\Unit');
  }

  public function photos()
  {
    return $this->hasMany('App\Photo');
  }

}
