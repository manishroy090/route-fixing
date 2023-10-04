<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $table = "menu_categories";
    protected $fillable = ['menu_category'];
}
