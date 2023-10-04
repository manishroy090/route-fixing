<?php
namespace App\Http\View\Composer;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MerchantDetailsComposer
{
    public function compose(View $view)
    {
      $merchant_details = Auth::user();
      $view->with([
        "merchant_details" => $merchant_details,
      ]);        
    }
}
