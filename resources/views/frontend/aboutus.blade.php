@extends('frontend.layouts.master')
@section('after-title')
<meta name="title" content="{{ $aboutus->about_us_meta_title }}" />
<meta name="keywords" content="{{ $aboutus->about_us_meta_keywords }}" />
<meta name="description" content="{{ $aboutus->about_us_meta_description }}" />
<meta property="og:title" content="{{ !empty($aboutus->about_us_title) ? $aboutus->about_us_title : 'About us '.env('DISPLAY_NAME','HAMRO QR MENU') }}" />
<meta property="og:description" content="{{ !empty($aboutus->about_us_description) ? substr(strip_tags($aboutus->about_us_description), 0, 140 ) : '' }}" />
<meta property="og:image" content="{{ ($aboutus->about_us_image != '' && file_exists(public_path('images/aboutus/'.$aboutus->about_us_image))) ? asset('images/aboutus/'.$aboutus->about_us_image) : asset('fallback-logo.png') }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{ !empty($aboutus->about_us_title) ? $aboutus->about_us_title : 'About us '.env('DISPLAY_NAME','HAMRO QR MENU') }}" />
<meta name="twitter:description" content="{{ !empty($aboutus->about_us_description)? substr(strip_tags($aboutus->about_us_description), 0, 140 ) : '' }}" />
<meta name="twitter:image" content="{{ ($aboutus->about_us_image != '' && file_exists(public_path('images/aboutus/'.$aboutus->about_us_image))) ? asset('images/aboutus/'.$aboutus->about_us_image) : asset('fallback-logo.png') }}" />
@endsection

@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="page-tittle">Hamro QR Menu</div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hamro QR Menu</li>
            </ol>
        </nav>
    </div>

</section>

<section class="QR-Menu-Intro custom-margin">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <figure data-tilt data-tilt-scale="1" data-tilt-speed="400" data-tilt-max="10">
                    <img src="{{ (($aboutus->about_us_image != '') && file_exists(public_path('images/aboutus/thumb/'.$aboutus->about_us_image))) ? asset('images/aboutus/thumb/'.$aboutus->about_us_image) : getFallBackImage(586, 458, 'default') }}" alt="{{ $aboutus->about_us_title }}">
                </figure>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="heading">
                    <h1 class="title">
                        @php
                            $about_heading_arr = splitBannerTitle($aboutus->about_us_title);
                        @endphp
                        @if(!empty($about_heading_arr))
                            {{ $about_heading_arr[0] }} 
                            @isset($about_heading_arr[1])
                                <span>{{ $about_heading_arr[1] }}</span>
                            @endisset
                        @else
                            What is <span>{{ env('DISPLAY_NAME','HAMRO QR MENU') }}?</span>
                        @endif
                    </h1>
                </div>
                <div class="text-document-content">
                    {!! $aboutus->about_us_description !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="QR-Menu-Intro custom-margin">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="heading">
                    <h1 class="title">
                        @php
                            $about_benefit_arr = splitBannerTitle($aboutus->about_us_benefit_title);
                        @endphp
                        @if(!empty($about_benefit_arr))
                            {{ $about_benefit_arr[0] }} 
                            @isset($about_benefit_arr[1])
                                <span>{{ $about_benefit_arr[1] }}</span>
                            @endisset
                        @else
                           Benefits of <span>{{ env('DISPLAY_NAME','HAMRO QR MENU') }}</span>
                        @endif
                    </h1>
                </div>
                <div class="text-document-content">
                   {!! $aboutus->about_us_benefit_description !!}
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <figure data-tilt data-tilt-scale="1" data-tilt-speed="400" data-tilt-max="10">
                    <img src="{{ (($aboutus->about_us_benefit_image != '') && file_exists(public_path('images/aboutus/thumb/'.$aboutus->about_us_benefit_image))) ? asset('images/aboutus/thumb/'.$aboutus->about_us_benefit_image) : getFallBackImage(586, 458, 'default') }}" alt="{{ $aboutus->about_us_benefit_title }}">
                </figure>
            </div>
        </div>
    </div>
</section>
@endsection