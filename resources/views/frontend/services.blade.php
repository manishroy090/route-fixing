@extends('frontend.layouts.master')
@section('after-title')

@endsection
@section('content')
<section class="breadcrumb-all">
    <div class="container">
        <div class="breadcrumb-wrapper">
            <div class=" breadcrumb-heading">Our Services</div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Services</li>
            </ol>
        </div>
    </div>
</section>

<!-- services -->
<section class="services-section custom-margin">
    <div class="container">
        <div class="section-header-wrapper">
            <div class="section-sub-heading">
                We offers
            </div>
            <h1 class="section-main-heading">Our Services </h1>
        </div>
        <div class="row gy-4">
            <div class="col-lg-4 col-md-3 col-sm-6 col-2">
                @forelse ($services as $service)
                <div class="service-card">
                    <div class="service-icon-box"><a href="service-details.php"><img src="{{asset('images/services/thumb/'.$service->services_icon)}}" alt=""></a></div>
                    <a href="service-details.php">
                        <h2 class="service-tittle">{{$service->services_title}}</h2>
                    </a>
                </div>

                @empty
                <div class="service-card">
                    <div class="service-icon-box"><a href="service-details.php"><img src="images/icon (3).png" alt=""></a></div>
                    <a href="service-details.php">
                        <h2 class="service-tittle">NO Service Record</h2>
                    </a>
                </div>

                @endforelse
            </div>
        </div>
    </div>
</section>

@section('after-footer')
@endsection
@endsection