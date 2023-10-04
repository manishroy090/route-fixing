<?php
namespace App\Http\View\Composer;

use Illuminate\View\View;
use App\Model\Settings;

class SettingsComposer
{
    public function compose(View $view)
    {
      $siteSettings = Settings::first();
      $view->with("siteSettings",$siteSettings);        
    }
}
