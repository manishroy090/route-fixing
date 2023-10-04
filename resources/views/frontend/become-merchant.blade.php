@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="page-tittle">{{ $title }}</div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
    </div>
</section>
@if($whyus->isNotEmpty())
<section class="work-flow custom-margin">
    <div class="container">
        <div class="heading">
            <h2 class="title text-center">How does <span>{{ env('DISPLAY_NAME','Hamro QR Menu') }}</span> work?</h2>
        </div>
        <div class="row gy-4 justify-content-center">
            @foreach($whyus as $value)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="process">
                    <figure>
                        <img src="{{ (($value->whyus_image != '') && file_exists(public_path('images/whyus/thumb/'.$value->whyus_image))) ? asset('images/whyus/thumb/'.$value->whyus_image) : getFallBackImage(177, 176, 'default') }}"
                            alt="{{ $value->whyus_title }}">
                    </figure>
                    <h3 class="process-title">{{ $value->whyus_title }}</h3>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif
@endsection