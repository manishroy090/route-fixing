@extends('frontend.layouts.master')
@section('after-title')

@endsection
@section('content')
<section class="breadcrumb-all">
    <div class="container">
        <div class="breadcrumb-wrapper">
            <div class=" breadcrumb-heading">About Us</div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
        </div>
    </div>
</section>

<!-- about-us -->
<section class="home-about-us custom-margin">
    <div class="container">
        <div class="row gy-4">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="section-header-wrapper">
                    <div class="section-sub-heading">
                        About Truly Asia
                    </div>
                    <h1 class="section-main-heading">{{$aboutus->about_us_title ?? "Enjoy a Luxury Experience with Truly Asia "}}</h1>
                </div>
                <div class="text-document-content">
                    <p>
                        {!!$aboutus->about_us_description ?? "Description not found"!!}
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="multi-img">
                    <figure>
                        <img src="{{asset('images/aboutus/'.$aboutus->about_us_image)}}" alt="First about us Image not Found">
                    </figure>
                    <figure>
                        <img src="{{asset('images/aboutus/'.$aboutus->about_us_fstimage)}}" alt="Second about us Image not found">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- restaurent-bar -->
<section class="restaurent-bar custom-margin button-margin-none" style="background-image: url('./images/img-1.jpg')">
    <div class="container">
        <div class="section-header-wrapper">
            <div class="section-sub-heading text-white text-center">
                Discovers
            </div>
            <h2 class="section-main-heading text-white text-center"> {{$aboutResturant->restaurent_title ?? "The Truely Asia Restaurants and Bars" }}</h2>
        </div>
        <div class="text-document-content">
            <p>
                {!!$aboutResturant->restaurent_description !!}
            </p>
        </div>
        <div class="custom-button mt-5">
            <a href="restaurent.php">Visit Now <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>

@section('after-footer')
@endsection
@endsection