@extends('frontend.layouts.master')
@section('content')

<section class="breadcrumbs-section">
    <div class="breadcrumbs-section-wrapper">
        <div class="container">
            <div class="page-heading"> {{ $title }}</div>
        </div>
    </div>
</section>

<section class="careers-at-hfc custom-margin">
    <div class="container">
        <h1 class="section-heading">{{ $section_heading->career_title }}</h1>
        <div class="lower-heading-short-description">
            <p>{!! $section_heading->career_content !!}</p>
        </div>
        @if($careers->isNotEmpty())
        @foreach($careers as $career)
        <div class="vaccancy-card">
            <h2 class="title">{{$career->career_title }}</h2>
            <ul class="vaccancy-overview">
                <li><span>Opening:</span>{{ $career->career_opening_number }}</li>
                <li><span>Location:</span>{{ $career->career_location }}</li>
                 @if($career->career_type==1)
                    <li><span>type:</span>Full Time</li>
                @elseif($career->career_type==2)
                    <li><span>type:</span>Casual</li>
                @else
                    <li><span>type:</span>Part Time</li>
                @endif

                @if($career->career_end_date != '' || $career->career_end_date != NULL)
                <li><span>Apply Before</span>{{ \Carbon\Carbon::parse($career->career_end_date)->format('F d, Y') }}</li>
                @endif
            </ul>
            <div class="des">
                <p>{!! Str::limit(strip_tags($career->career_description), 300) !!}</p>
            </div>
            <div class="custom-buttons">
                <a href="{{route('frontend.career_details',$career->career_slug) }}">Apply Now</a>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-sm-12 col-md-12 col-lg-12">
            <p> <b>No records found</b>   </p>
        </div>
        @endif
        @if($careers->links())
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{ $careers->links()}}
            </ul>
        </nav>
        @endif

    </div>
</section>


@endsection