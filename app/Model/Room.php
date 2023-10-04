<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
  use   SoftDeletes;
//     protected $fillable = [
//     'room_description',
//     'room_category_id ',
//     'room_price',
//     'room_images',
//     'room_capacity',
//     'meta_title',
//     'meta_keywords',
//     'meta_description',
//     'schema'
//  ];
protected $guarded = [];
}
