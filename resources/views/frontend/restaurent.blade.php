@extends('frontend.layouts.master')
@section('after-title')

@endsection
@section('content')
<section class="breadcrumb-all">
    <div class="container">
        <div class="breadcrumb-wrapper">
            <div class=" breadcrumb-heading">Restaurant and Bar</div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Restaurant and Bar</li>
            </ol>
        </div>
    </div>
</section>

<!-- services -->
<section class="Restaurant-bar-section custom-margin">
    <div class="container">

        <div class="section-header-wrapper">
            <div class="section-sub-heading text-center">
                Fell like Home Test Like Paradise
            </div>
            <h1 class="section-main-heading text-center">{{$aboutResturant->restaurent_title}}</h1>
        </div>

        <div class="text-document-content text-center">
            <p>
                {{$aboutResturant->restaurent_description}}
            </p>
        </div>
        <figure class="mt-5">
            <img src="{{(($aboutResturant->restaurent_images ?? ''   != '' ) && file_exists(public_path('images/restaurent/thumb/'.$aboutResturant->restaurent_images))) ? asset('images/restaurent/thumb/'.$aboutResturant->restaurent_images) : getFallBackImage(586, 458, 'default') }}" alt="">
        </figure>

    </div>
    <div class="aside-decor">
        <figure>
            <img src="images/aside-decor-pic.png" alt="">
        </figure>
    </div>
</section>
<section class="custom-margin menu-section" style="background-image: url('./images/menu-bg.png')">
    <div class="container">
        <div class="section-header-wrapper">
            <div class="section-sub-heading text-center">
                Tasty And Crunchy
            </div>
            <h2 class="section-main-heading text-center text-white">Restaurant menu</h2>
        </div>
        <div class="menu-wrapper">
            <nav>
                <div class="nav nav-tabs owl-carousel owl-menu-category owl-theme" id="nav-tab" role="tablist">
                    @foreach ($menuCategories as $menucategory)
                    <a href="javascript:void(0)">
                        <button class="nav-link active menucategory" id="nav-{{$menucategory->id}}-tab" data-url="{{route('frontend.restaurants',$menucategory->id)}}" data-bs-toggle="tab" data-bs-target="#nav-{{$menucategory->id}}" type="button" role="tab" aria-controls="nav-Dessert" aria-selected="true">{{$menucategory->menu_category}}</button>
                    </a>
                    @endforeach
                    <!-- <button class="nav-link" id="nav-Starters-tab" data-bs-toggle="tab" data-bs-target="#nav-Starters" type="button" role="tab" aria-controls="nav-Starters" aria-selected="false">Starters</button>
                    <button class="nav-link" id="nav-mains-tab" data-bs-toggle="tab" data-bs-target="#nav-mains" type="button" role="tab" aria-controls="nav-mains" aria-selected="false">mains</button>
                    <button class="nav-link" id="nav-salads-tab" data-bs-toggle="tab" data-bs-target="#nav-salads" type="button" role="tab" aria-controls="nav-salads" aria-selected="false">salads</button>
                    <button class="nav-link" id="nav-wine-tab" data-bs-toggle="tab" data-bs-target="#nav-wine" type="button" role="tab" aria-controls="nav-wine" aria-selected="false">wine</button> -->
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-{{$menucategory->id}}" role="tabpanel" aria-labelledby="nav-{{$menucategory->id}}-tab">
                    <div class="menu-content">
                        <div class="menu-item">
                            <div class="item-name-price">
                                <div class="item-name">Food name</div>
                                <div class="price">food price</div>
                            </div>
                            <span>food Description</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="today-specal custom-margin ">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <figure>
                    <img src="images/img-12.png" alt="">
                </figure>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 offset-lg-1">
                <div class="section-header-wrapper">
                    <div class="section-sub-heading">
                        Today Special
                    </div>
                    <h2 class="section-main-heading">Losos & Vegetables</h2>
                </div>
                <div class="text-document-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse ullamco laboris nisi ut aliquip commodo.labore et dolore magna aliqua. Ut
                        enim ad minim veniam, quis nostrud exercitation ullamco exercitation ullamco
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="right-side-decor">
        <figure>
            <img src="images/right-aside-decor.png" alt="">
        </figure>
    </div>
</section>
<section class="custom-margin contact-us-page table-booking">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12">
                <div class="section-header-wrapper">
                    <div class="section-sub-heading">
                        Online Reservation
                    </div>
                    <h2 class="section-main-heading">Contact us</h2>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <div class="lunch-dinner-time">
                    <div class="time-table">
                        <div class="heading">Lunch Time</div>
                        <div class="days">Monday to Sunday</div>
                        <div class="time">
                            9:30 AM - 2:00 PM
                        </div>
                    </div>
                    <div class="time-table">
                        <div class="heading">Dinner Time</div>
                        <span>Monday to Sunday</span>
                        <div class="time">
                            9:30 AM - 2:00 PM
                        </div>
                    </div>
                </div>

                <div class="support-contact-information">
                    <div class="heading">For any Support </div>
                    <ul>
                        <li>
                            <div class="contact-details">
                                <div class="icon"><i class="fa-solid fa-phone-volume"></i></div>
                                <div class="detail">
                                    <div>Reservastion</div>
                                    <div class="wrapper">
                                        <a href="">+977-938543587</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="contact-details ">
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="detail">
                                    <div>Address</div>
                                    <div class="wrapper">
                                        Maitedevi, setopool, Kathmandu
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <form action="" class="table-booking-form form-element">
                    <div class="section-header-wrapper">
                        <div class="section-sub-heading">
                            Contact us
                        </div>
                        <div class="section-main-heading">Get in touch</div>
                    </div>
                    <div class="row gy-4">
                        <div class="col-lg-12 col-sm-12 col-md-6">
                            <input type="number" placeholder="Person" class="form-control " min="1">
                            <div class="error-message">Select the number of people</div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-6">
                            <input type="text" placeholder="Date" class="form-control" id="booking_date">
                            <div class="error-message">Date is required.</div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="text" placeholder="Time" class="form-control" id="booking_time">
                            <div class="error-message">Time is required.</div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <textarea name="message" class="form-control" id="message" rows="5" placeholder="Special Request"></textarea>
                        </div>
                    </div>
                    <div class="custom-button mt-5">
                        <button type="submit">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@section('after-footer')
@endsection
@endsection