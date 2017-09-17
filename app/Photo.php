<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $fillable = [
    'thumbnail',
    'photo'
  ];

  public function item()
  {
    return $this->belongsTo('App\Item');
  }
}
