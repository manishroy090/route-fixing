<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
{
    use Sluggable;
    protected $table = "pages";

    protected $fillable = [
    	"pages_title",
    	"pages_slug",
    	"pages_order",
    	"pages_description",
    	"pages_image",
    	"pages_meta_title",
    	"pages_meta_description",
    ];
	public function sluggable(): array
    {
        return [
            'pages_slug' => [
                'source' => 'pages_title',
                "onUpdate" => true,
            ]
        ];
	}
}