@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section">
   <div class="container">
      <div class="page-tittle">Our subscription plans</div>
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Subscription Plans</li>
         </ol>
      </nav>
   </div>
</section>
<section class="custom-margin">
   <div class="container">
      <div class="heading">
         <h1 class="title text-center">Simple plans. <span>Fix pricing.</span> </h1>
      </div>
      <div class="row gy-4 justify-content-center">
         @if($packageSubscriptions->isNotEmpty())
            @foreach($packageSubscriptions as $packageSubscription)
            <div class="col-lg-4 col-md-6 col-sm-12">
               <div class="subscription-card">
                  <div class="subscription-name-discount-rate">
                     <div class="package-title">{{ $packageSubscription->package_subscriptions_title }}</div>
                     @if($packageSubscription->package_subscriptions_discount_percent > 0)
                     <div class="discount-rate">{{ implode(" ",[$packageSubscription->package_subscriptions_discount_percent,"% off"]) }}</div>
                     @endif
                  </div>
                  <div class="price-tag">
                     @if($packageSubscription->package_subscriptions_discount_percent > 0)
                     <span class="discount-price">{{ implode(" ",[env("DISPLAY_CURRENCY","NPR"), floatval($packageSubscription->package_subscriptions_price)]) }}</span>
                     @php
                     $new_discounted_price = ($packageSubscription->package_subscriptions_price) - ($packageSubscription->package_subscriptions_discount_percent/100) * $packageSubscription->package_subscriptions_price;
                     @endphp
                     <span>{{ implode(" ",[env("DISPLAY_CURRENCY","NPR"), floatval($new_discounted_price)]) }}</span>
                     @else
                     <span>{{ implode(" ",[env("DISPLAY_CURRENCY","NPR"), floatval($packageSubscription->package_subscriptions_price)]) }}</span>
                     @endif
                     <span class="package-subscription-type">{{ str_replace("-"," ", $packageSubscription->package_subscriptions_type) }}</span>
                  </div>
                  
                  <div class="text-document-content">
                     {!! $packageSubscription->package_subscriptions_description !!}
                  </div>
                  <div class="custom-buttons mt-3">
                     <a href="{{ route('user.merchant.checkout',['type' => 'package', 'value' => $packageSubscription->package_subscriptions_slug]) }}">Subscribe Now</a>
                  </div>
               </div>
            </div>
            @endforeach

            @if($packageSubscriptions->hasPages())
            <div class="col-lg-12 col-md-12 col-sm-12">
                {{ $packageSubscriptions->links() }}
            </div>
            @endif

         @else
            <div class="col-lg-12 col-md-12 col-sm-12">
               <p class="text-center">No Subscription Plans Found</p>
            </div>
         @endif
      </div>
   </div>
</section>

<section class="overlap-footer-section buttom-margin-none custom-margin">
   <div class="container">
      <div class="heading">
         <h2 class="title text-center">{{ ($plan_section_title != '') ? $plan_section_title : "Ready to Grow with us?" }}</h2>
      </div>
      <div class=" center-custom-width">
         <p class="text-center">{{ $plan_section_description }}</p>
      </div>
      <div class="button-wrapper mt-5">
         <div class="custom-buttons ">
            <a href="{{ route('frontend.become-a-merchant') }}">Start 15 days Trail</a>
         </div>
         <div class="custom-buttons button-primary">
            <a href="{{ route('frontend.contact') }}">Book a meeting</a>
         </div>
      </div>
   </div>
</section>

@endsection