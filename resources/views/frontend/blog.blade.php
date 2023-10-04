@extends('frontend.layouts.master')
@section('after-title')
<meta name="title" content="{{ $blog->blog_meta_title }}" />
<meta name="keywords" content="{{ $blog->blog_meta_keywords }}" />
<meta name="description" content="{{ $blog->blog_meta_description }}" />
<meta property="og:title" content="{{ !empty($blog->blog_title) ? $blog->blog_title : '' }}" />
<meta property="og:description" content="{{ !empty($blog->blog_description) ? substr(strip_tags($blog->blog_description), 0, 140 ) : '' }}" />
<meta property="og:image" content="{{ ($blog->blog_image != '' && file_exists(public_path('images/blogs/'.$blog->blog_image))) ? asset('images/blogs/'.$blog->blog_image) : asset('fallback-logo.png') }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{ !empty($blog->blog_title) ? $blog->blog_title : '' }}" />
<meta name="twitter:description" content="{{ !empty($blog->blog_description)? substr(strip_tags($blog->blog_description), 0, 140 ) : '' }}" />
<meta name="twitter:image" content="{{ ($blog->blog_image != '' && file_exists(public_path('images/blogs/'.$blog->blog_image))) ? asset('images/blogs/'.$blog->blog_image) : asset('fallback-logo.png') }}" />
@endsection
@section('content')
<section class="breadcrumb-section">
   <div class="container">
      <div class="page-tittle">Our Recent Updates</div>
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Updates</li>
         </ol>
      </nav>
   </div>
</section>
<section class="recent-blog-single custom-margin">
   <div class="container">
   <div class="row gy-4">
      <div class="col-lg-8">
         <div class="heading">
            <h1 class="title">{{ $title }}</h1>
            <div class="blog-posted-date"><i class="fa-solid fa-calendar-days"></i><span>{{ \Carbon\Carbon::parse($blog->blog_date)->format("d M Y") }}</span>
            </div>
         </div>
         <div class="blog-cover">
            <figure>
               <img src="{{ (($blog->blog_image != '') && file_exists(public_path('images/blogs/'.$blog->blog_image))) ? asset('images/blogs/'.$blog->blog_image) : getFallBackImage(736,408,'default') }}" alt="{ $title }}">
            </figure>
         </div>
         <div class="blog-details">
            <div class="text-document-content">
               {!! $blog->blog_description  !!}
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="related-blogs">
               @if($other_blogs->isNotEmpty())
               <div class="heading"><span>POPULAR POST</span></div>
                  <ul>
                     @foreach($other_blogs as $other_blog)
                     <li>
                        <div class="related-blog-cover">
                           <figure>
                              <img src="{{ (($other_blog->blog_image != '') && file_exists(public_path('images/blogs/thumb/'.$other_blog->blog_image))) ? asset('images/blogs/thumb/'.$other_blog->blog_image) : getFallBackImage(397,249,'default') }}" alt="{{ $other_blog->blog_title }}">
                           </figure>
                        </div>
                        <div class="blog-details">
                           <a href="">
                              <h2 class="blog-tittle">
                                 {{ $other_blog->blog_title }}
                              </h2>
                           </a>
                           <div class="blog-posted-date"><i class="fa-solid fa-calendar-days"></i>
                              <span> {{ \Carbon\Carbon::parse($other_blog->blog_date)->format("d M Y") }} </span>
                           </div>
                     </li>
                     @endforeach
                  </ul>
               @endif
            </div>
         </div>
      </div>
   </div>
</section>
@endsection