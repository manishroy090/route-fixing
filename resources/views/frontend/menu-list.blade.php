@extends('frontend.layouts.menu-master')
@section('content')
@php
$cover_image = ($restaurant->restaurant_cover_image != '' && file_exists(public_path('images/restaurant/'.$restaurant->restaurant_cover_image))) ? asset('images/restaurant/'.$restaurant->restaurant_cover_image): '';
$logo_image = ($restaurant->restaurant_logo != '' && file_exists(public_path('images/restaurant/thumb/'.$restaurant->restaurant_logo))) ? asset('images/restaurant/thumb/'.$restaurant->restaurant_logo): getFallBackImage(150,150,'default');
$opening_closing_time = implode(" - ",[\Carbon\Carbon::parse($restaurant->restaurant_opening_time)->format('h:i A'), \Carbon\Carbon::parse($restaurant->restaurant_closing_time)->format('h:i A')]);
$restaurant_name = $restaurant->restaurant_name;
$restaurant_address = $restaurant->restaurant_location;
@endphp
<header class="restaurent-menu-header" style="background-image: url({{ $cover_image  }})" data-resturant="{{ implode('-',[($restaurant->restaurant_id), $visitor_id, $scan_type]) }}">
   <div class="container">
      <div class="header-wrapper menu-header-wrapper" data-visitor_id="{{ $visitor_id }}">
         <div class="logo">
            <figure>
               <img src="{{ $logo_image }}" alt="{{ $restaurant_name }}">
            </figure>
         </div>
         <div class="restaurent-details">
            <h1 class="restaurent-name">{{ $restaurant_name }}</h1>
            <div class="opening-hours">
               <i class="fa-regular fa-clock"></i>
               <span>{{ $opening_closing_time }}</span>
            </div>
         </div>
      </div>
   </div>
</header>
<section class="menu-content">
   <div class="container">
      @php
         $top_ad = getAds("menu", "top");
      @endphp
      @if($top_ad != false)
         @if($top_ad->advertisement_image != '' && file_exists(public_path('images/ads/'.$top_ad->advertisement_image)))
         <div class="advetisement advetisement-slider top-margin">
            <figure>
               <a @if(!in_array($top_ad->advertisement_link,["",NULL])) href="{{ $top_ad->advertisement_link }}" target="_blank" @endif>
                  <img src="{{ asset('images/ads/'.$top_ad->advertisement_image) }}" alt="{{ $top_ad->advertisement_title }}">
               </a>
            </figure>
         </div>
         @endif
      @endif
      @if($menu_categories->isNotEmpty())
         <div class="infinite-scroll">
         @foreach($menu_categories as $menu_category)
            @php
               $category_items = $menu_category->category_items()->get();        
            @endphp
            <div class="menu-category top-margin {{ ($menu_category->parent()->exists()) ? 'sub-category-menu' : '' }}">
               <div class="category-heading">
                  <h2 class="category-tittle">{{ $menu_category->category_title }}</h2>
               </div>
               @if($category_items->isNotEmpty())
               <div class="category-item">
                  <ul id="{{ $menu_category->category_slug }}">
                     @foreach($category_items as $category_item)
                     <li>
                        <div class="wrapper">
                           <figure>
                              <img src="{{ ($category_item->item_image != '' && file_exists(public_path('images/menu/items/thumb/'.$category_item->item_image))) ? asset('images/menu/items/thumb/'.$category_item->item_image) : getFallBackImage(101,100,'menu') }}" alt="{{ $category_item->item_title }}">
                           </figure>
                           <div class="menu-items-details">
                              <div class="name-price">
                                 <div class="name">{{ $category_item->item_title }}</div>
                                 <div class="price">{{ implode(" ", [env("DISPLAY_CURRENCY","NPR."), $category_item->item_price]) }}</div>
                              </div>
                              <p>
                                 {{ Str::limit($category_item->item_description,75) }}
                              </p>
                           </div>
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
               @else
                  {{-- <div>
                     <ul id="{{ $menu_category->category_slug }}">
                         <li>
                           <div class="wrapper">
                              <figure>
                              </figure>
                              <div class="menu-items-details">
                                 <p>No Item/s Available</p>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div> --}}
               @endif
            </div>
         @endforeach
​
         @if($menu_categories->hasPages())
            <div class="menu_items_pagination mt-2 mb-2">   
               {{ $menu_categories->links() }}
            </div>
         @endif
      </div>
      @endif
      @php
         $bottom_ad = getAds("menu", "bottom");
      @endphp
      @if($bottom_ad != false)
         @if($bottom_ad->advertisement_image != '' && file_exists(public_path('images/ads/'.$bottom_ad->advertisement_image)))
         <div class="advetisement top-margin">
            <figure>
               <a @if(!in_array($bottom_ad->advertisement_link,["",NULL])) href="{{ $bottom_ad->advertisement_link }}" target="_blank" @endif>
                  <img src="{{ asset('images/ads/'.$bottom_ad->advertisement_image) }}" alt="{{ $bottom_ad->advertisement_title }}">
               </a>
            </figure>
         </div>
         @endif
      @endif
   </div>
</section>
<footer class="Restaurent-menu-footer">
   <div class="container">
      <div class="logo">
         <figure>
            <img src="{{ $logo_image }}" alt="{{ $restaurant_name }}">
         </figure>
      </div>
      <div class="restaurent-name">
         {{ $restaurant_name }}
      </div>
      <div class="contact-info">
         <ul>
            <li>
               {{ $restaurant_address }}
            </li>
            <li>
               <div class="wrapper">
                  {!! getClickableLinks($restaurant->restaurant_email,"email") !!}
               </div>
            </li>
            <li>
               <div class="wrapper">
                  {!! getClickableLinks($restaurant->restaurant_phone,"phone") !!}
               </div>
            </li>
         </ul>
      </div>
      <div class="social-media-section top-margin ">
         <div class="footer-heading">Follow us</div>
         <div class="social-media">
            <ul>
               <li>
                  <a class="facebook" @if($restaurant->restaurant_facebook_url != NULL) href="{{ $restaurant->restaurant_facebook_url }}" target="_blank" @endif><i class="fab fa-facebook-f"></i></a>
               </li>
               <li>
                  <a class="instagram" @if($restaurant->restaurant_instagram_url) href="{{ $restaurant->restaurant_instagram_url }}" target="_blank" @endif><i class="fab fa-instagram"></i></a>
               </li>
               <li>
                  <a class="youtube" @if($restaurant->restaurant_youtube_url) href="{{ $restaurant->restaurant_youtube_url }}" target="_blank" @endif><i class="fab fa-youtube"></i></a>
               </li>
               <li>
                  <a class="tiktok" @if($restaurant->restaurant_tiktok_url) href="{{ $restaurant->restaurant_tiktok_url }}" target="_blank" @endif><i class="fab fa-tiktok"></i></a>
               </li>
            </ul>
         </div>
      </div>
      <div class="opening-hours top-margin ">
         <div class="footer-heading">Opening Hours</div>
         <span>{{ $opening_closing_time }}</span>
      </div>
      <div class="power-by top-margin ">
         <div class="footer-heading">Powered by</div>
         <figure>
            <a class="navbar-brand" href="{{ route('frontend.home') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt="{{ env('APP_NAME','Digital Menu Solution Pvt. Ltd.') }}"></a>
         </figure>
      </div>
      <div class="copy-right top-margin ">
         <p>© {{ \Carbon\Carbon::now()->format('Y') }}. {{ env('APP_NAME','Digital Menu Solution Pvt. Ltd.') }} All Rights Reserved.</p>
      </div>
   </div>
</footer>
@endsection