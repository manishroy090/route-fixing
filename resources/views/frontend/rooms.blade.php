@extends('frontend.layouts.master')
@section('after-title')

@endsection
@section('content')
<section class="breadcrumb-all">
    <div class="container">
        <div class="breadcrumb-wrapper">
            <div class=" breadcrumb-heading">Room & Suits</div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Rooms</li>
            </ol>
        </div>
    </div>
</section>

<!-- rooms and suits -->
<section class="rooms-section custom-margin">
    <div class="container">
        <div class="section-header-wrapper">
            <div class="section-sub-heading">
                The Truly Asia
            </div>
            <h1 class="section-main-heading">Rooms & Suits </h1>
        </div>
        <div class="row gy-4">
            @foreach ($roomList as $room)

            <div class="col-lg-4 col-md-2 col-sm-12">
                <div class="room-cards">
                    <figure class="room-cover">
                        <img src="{{asset('images/rooms/'.$room->room_images)}}" alt="">
                    </figure>

                    <div class="rooms-details ">
                        <div class="price-tag">${{$room->room_price}} / NIGHT</div>
                        <a href="room-details.php">
                            <h3 class="room-tittle">
                                {{$room->room_category}}
                            </h3>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@section('after-footer')
@endsection
@endsection