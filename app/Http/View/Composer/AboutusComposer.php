<?php
namespace App\Http\View\Composer;

use Illuminate\View\View;
use App\Model\AboutUs;

class AboutusComposer
{
    public function compose(View $view)
    {
      $aboutus = AboutUs::first();
      $view->with("aboutus",$aboutus);        
    }
}
