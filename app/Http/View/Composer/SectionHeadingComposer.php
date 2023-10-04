<?php
namespace App\Http\View\Composer;

use App\Model\SectionPageHeadings;
use Illuminate\View\View;

class SectionHeadingComposer
{
    public function compose(View $view)
    {
      $section_heading = SectionPageHeadings::first();
      $view->with("section_heading",$section_heading);        
    }
}
