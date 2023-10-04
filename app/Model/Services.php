<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Services extends Model
{
	use Sluggable;

  protected $table = "services";

  protected $fillable = [
  	"services_title",
  	"services_slug",
  	"services_description",
    "services_coverimage",
    "services_icon"
  ];

  public function sluggable(): array
    {
        return [
            'services_slug' => [
              'source' => 'services_title',
              "onUpdate" => true,
            ]
        ];
    }

}
