@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumbs-section">
    <div class="breadcrumbs-section-wrapper">
        <div class="container">
            <div class="page-heading">Our team</div>
        </div>
    </div>
</section>
    @forelse ($teamCategories as $category)
            <section class="our-team-member custom-margin">
                <div class="container">
                    @if($category->teams->isNotEmpty())
                    <h1 class="section-heading">{{ $category->team_category_title }}</h1>
                    <div class="row gy-4 justify-content-center">
                        @foreach($category->teams as $team)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="team-card">
                                <div class="profile-cover">
                                    <figure>
                                        <img src="{{ (($team->team_image != '') && file_exists(public_path('images/teams/'.$team->team_image))) ? asset('images/teams/'.$team->team_image) : asset('images/user-avatar.png') }}" alt="{{$team->testimonial_author}}">
                                    </figure>
                                </div>
                                <div class="team-details">
                                    <h3 class="name">{{ $team->team_name }}</h3>
                                    <span class="designation">{{ $team->team_designation }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        
                    @endif
                </div>
            </section>
    @empty
    @else 
    <section class="our-team-member custom-margin">
        <div class="container">
                <p class="text-center">No Team Members</p>
        </div>
    </section>
    @endforelse

@endsection