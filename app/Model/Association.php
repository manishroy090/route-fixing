<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    protected $table = 'associations';
    
    protected $fillable = [
        'association_title', 
        'association_order',
        'association_image'
    ];
}
