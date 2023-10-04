@extends('frontend.layouts.master')
@section('after-title')

@endsection
@section('content')
<!-- banner -->
<section class="banner">
    <div class="owl-carousel owl-banner owl-theme">
        @foreach ($banners as $banner)
        <figure>
            <img src="{{(($banner->banner_image ?? ''   != '' ) && file_exists(public_path('images/banners/'.$banner->banner_image))) ? asset('images/banners/thumb/'.$banner->banner_image) : getFallBackImage(586, 458, 'default') }}" alt="">
        </figure>
        <figure>
            <img src="{{(($banner->banner_image ?? ''   != '' ) && file_exists(public_path('images/banners/'.$banner->banner_image))) ? asset('images/banners/thumb/'.$banner->banner_image) : getFallBackImage(586, 458, 'default') }}" alt="">
        </figure>
        <figure>
            <img src="{{(($banner->banner_image ?? ''   != '' ) && file_exists(public_path('images/banners/'.$banner->banner_image))) ? asset('images/banners/thumb/'.$banner->banner_image) : getFallBackImage(586, 458, 'default') }}" alt="">
        </figure>
        @endforeach

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
                <div class="custom-button mt-5">
                    <a href="about-us.php">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="multi-img">
                    <figure>
                        <img src="{{(($aboutus->about_us_image ?? ''   != '' ) && file_exists(public_path('images/aboutus/'.$aboutus->about_us_image))) ? asset('images/aboutus/humb/'.$aboutus->about_us_image) : getFallBackImage(586, 458, 'default') }}" alt="First about us Image not Found">
                    </figure>
                    <figure>
                        <img src="{{(($aboutus->about_us_image ?? ''   != '' ) && file_exists(public_path('images/aboutus/'.$aboutus->about_us_image))) ? asset('images/aboutus/humb/'.$aboutus->about_us_image) : getFallBackImage(586, 458, 'default') }}" alt="Second about us Image not found">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- restaurent-bar -->
<section class="restaurent-bar custom-margin" style="background-image: url('./images/img-1.jpg')">
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

<!-- services  -->
<section class="services-section custom-margin">
    <div class="container">
        <div class="heading-view-all-wrapper">
            <div class="section-header-wrapper">
                <div class="section-sub-heading">
                    We offers
                </div>
                <h2 class="section-main-heading">Our Services </h2>
            </div>
            <div class="custom-button ">
                <a href="service.php">View All <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="row gy-4">
            <div class="col-lg-4 col-md-3 col-sm-6 col-2">
                @forelse ($services as $service)
                <div class="service-card">
                    <div class="service-icon-box"><a href="service-details.php"><img src="{{asset('images/services/thumb/'.$service->services_icon)}}" alt=""></a></div>
                    <a href="service-details.php">
                        <h3 class="service-tittle">{{$service->services_title}}</h3>
                    </a>
                </div>
                @empty
                <div class="service-card">
                    <div class="service-icon-box"><a href="service-details.php">service icon not found</a></div>
                    <a href="service-details.php">
                        <h3 class="service-tittle">Service title not found</h3>
                    </a>
                </div>
                @endforelse

            </div>
        </div>
    </div>
</section>

<!-- rooms and suits -->
<section class="rooms-suits custom-margin">
    <div class="container">
        <div class="row gy-4">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="section-header-wrapper">
                    <div class="section-sub-heading">
                        The Truly Asia
                    </div>
                    <h2 class="section-main-heading">Rooms & Suites</h2>
                </div>
                <div class="text-document-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse ullamco laboris nisi ut aliquip commodo.labore et dolore magna aliqua. Ut
                        enim ad minim veniam, quis nostrud exercitation ullamco exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        ullamco laboris nisi
                    </p>
                </div>
                <div class="contact-details mt-5">
                    <div class="icon"><i class="fa-solid fa-phone-volume"></i></div>
                    <div class="detail">
                        <div>For information</div>
                        <div class="wrapper">
                            <a href="">+977-938543587</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8">
                <div class="owl-carousel owl-rooms owl-theme">
                    @forelse ($roomList as $room)
                    <div class="room-cards">
                        <figure class="room-cover">
                            <img src="{{asset('images/rooms/'.$room->room_images)}}" alt="">
                        </figure>
                        <div class="booked-tag">
                            booked
                        </div>
                        <div class="rooms-details ">
                            <div class="price-tag">{{$room->room_price}}/ NIGHT</div>
                            <a href="room-details.php">
                                <h3 class="room-tittle">
                                    Family Room
                                </h3>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="room-cards">
                        <figure class="room-cover">
                            Image not found
                        </figure>
                        <div class="booked-tag">
                            room status not found
                        </div>
                        <div class="rooms-details ">
                            <div class="price-tag">Price not found / NIGHT</div>
                            <a href="room-details.php">
                                <h3 class="room-tittle">
                                    Room Category not found
                                </h3>
                            </a>
                        </div>
                    </div>

                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>



<!-- testimonial -->
<section class="testimonial custom-margin">
    <div class="container">
        <div class="section-header-wrapper">
            <div class="section-sub-heading">
                Reviews
            </div>
            <h2 class="section-main-heading">Sweet Words From Our Customers</h2>
        </div>
        <div class="owl-carousel owl-testimonial owl-theme">
            @forelse ($testimonials as $testimonial)
            <div class="testimonial-card">
                <i class="fa-solid fa-quote-left"></i>
                <div class="description review-description">
                    {{$testimonial->testimonial_description}}
                </div>
                <div class="name">{{$testimonial->testimonial_author}}</div>
            </div>
            @empty
            <div class="testimonial-card">
                <i class="fa-solid fa-quote-left"></i>
                <div class="description review-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et , quis nostrud exercitation commodo consequat. Duis aute irure dolor in ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                </div>
                <div class="name">Jane Doe</div>
            </div>

            @endforelse


        </div>
</section>






<!-- universities -->
<section class="images-gallery-instagram custom-margin">
    <div class="container">
        <div class="heading-view-all-wrapper">
            <div class="section-header-wrapper">
                <div class="section-sub-heading">
                    Captured on Instagram
                </div>
                <h2 class="section-main-heading">Our Sweet Memories</h2>
            </div>
            <div class="custom-button ">
                <a href="gallery.php">View All <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="owl-carousel owl-images-gallery owl-theme">
            <a data-fancybox="image-gallery-content" href="images/img-1.jpg">
                <figure>
                    <img src="images/img-1.jpg" alt="">
                </figure>
            </a>
            <a data-fancybox="image-gallery-content" href="images/img-2.png">
                <figure>
                    <img src="images/img-2.png" alt="">
                </figure>
            </a>
            <a data-fancybox="image-gallery-content" href="images/img-3.png">
                <figure>
                    <img src="images/img-3.png" alt="">
                </figure>
            </a>
            <a data-fancybox="image-gallery-content" href="images/img-4.jpg">
                <figure>
                    <img src="images/img-4.jpg" alt="">
                </figure>
            </a>
            <a data-fancybox="image-gallery-content" href="images/img-5.jpg">
                <figure>
                    <img src="images/img-5.jpg" alt="">
                </figure>
            </a>
            <a data-fancybox="image-gallery-content" href="images/img-6.jpg">
                <figure>
                    <img src="images/img-6.jpg" alt="">
                </figure>
            </a>
            <a data-fancybox="image-gallery-content" href="images/img-7.jpg">
                <figure>
                    <img src="images/img-7.jpg" alt="">
                </figure>
            </a>
            <a data-fancybox="image-gallery-content" href="images/img-8.jpg">
                <figure>
                    <img src="images/img-8.jpg" alt="">
                </figure>
            </a>
        </div>
    </div>
</section>
@section('after-footer')
@endsection
@endsection