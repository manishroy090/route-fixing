@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="page-tittle">Tutorial video guide</div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Video tutorial</li>
            </ol>
        </nav>
    </div>
</section>
<section class="custom-margin">
    <div class="container">
        <div class="heading">
            <h1 class="title text-center">Tutorial Video Step-by-Step Guide </h1>
        </div>
        <div class="row gy-4 justify-content-center">
            @if($video_tutorials->isNotEmpty())
                @foreach($video_tutorials as $video_tutorial)
                    <div class="{{ ($loop->iteration == 1) ? 'col-lg-12 col-md-12 col-sm-12' : 'col-lg-4 col-md-6 col-sm-12' }}">
                        <div class="video-wrapper {{ ($loop->iteration == 1) ? 'main-video' : '' }}">
                            <figure>
                                <img src="{{ (($video_tutorial->video_tutorials_fallbackimage != '') && file_exists(public_path('images/videos/thumb/'.$video_tutorial->video_tutorials_fallbackimage))) ? asset('images/videos/thumb/'.$video_tutorial->video_tutorials_fallbackimage) : getFallBackImage(781, 500,'default') }}" alt="{{ $video_tutorial->video_tutorials_title }}">
                                <a class="popup-youtube" href="{{ $video_tutorial->video_tutorials_url }}">
                                    <div class="video-play-button">
                                        <i class="fa-solid fa-play fa-beat"></i>
                                    </div>
                                </a>
                            </figure>
                            <h2 class="video-tittle">{{ $video_tutorial->video_tutorials_title }}</h2>
                        </div>
                    </div>
                @endforeach
                @if($video_tutorials->hasPages())
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        {{ $video_tutorials->links() }}
                    </div>
                @endif
            @else
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <p class="text-center">No Video Tutorials Found</p>
                </div>
            @endif
        </div>
    </div>
</section>


@endsection