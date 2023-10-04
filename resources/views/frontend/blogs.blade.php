@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section">
   <div class="container">
      <div class="page-tittle">Our Recent Updates</div>
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Updates</li>
         </ol>
      </nav>
   </div>
</section>
<section class="recent-blog custom-margin">
   <div class="container">
      <div class="heading">
         <h1 class="title text-center">Our Recent Updates</h1>
      </div>
      <div class="row gy-4 justify-content-center">
         @if($blogs->isNotEmpty())
            @foreach($blogs as $blog)
               <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="blog-card">
                     <div class="blog-cover">
                        <a href="{{ route('frontend.blogs_single',[$blog->blog_slug]) }}">
                           <figure>
                           <img src="{{ (($blog->blog_image != '') && file_exists(public_path('images/blogs/thumb/'.$blog->blog_image))) ? asset('images/blogs/thumb/'.$blog->blog_image) : getFallBackImage(397,249,'default') }}" alt="{{ $blog->blog_title }}">
                        </figure>
                        </a>
                     </div>
                     <div class="blog-details">
                        <a href="{{ route('frontend.blogs_single',[$blog->blog_slug]) }}"><h3 class="blog-title">{{ $blog->blog_title }}</h3></a>
                        <div class="blog-posted-date"><i class="fa-solid fa-calendar-days"></i><span>{{ \Carbon\Carbon::parse($blog->blog_date)->format("d M Y") }}</span>
                        </div>
                        <div class="blog-des">
                           <p>{!! Str::limit(strip_tags($blog->blog_description), 125) !!}</p>
                        </div>
                        <a href="{{ route('frontend.blogs_single',[$blog->blog_slug]) }}" class="read-more">Read more <i
                           class="fa-solid fa-right-long"></i></a>
                     </div>
                  </div>
               </div>
            @endforeach
            @if($blogs->hasPages())
               <div class="col-lg-12 col-md-12 col-sm-12">
                     {{ $blogs->links() }}
               </div>
            @endif
         @else
         <div class="col-lg-12 col-md-12 col-sm-12">
            <p class="text-center">No Updates Found</p>
         </div>
         @endif
      </div>
   </div>
</section>
@endsection