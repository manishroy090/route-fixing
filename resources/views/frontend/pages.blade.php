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
<section class="custom-margin ">
   <div class="container">
      <div class="heading">
         <h1 class="title text-center">{{ $title }}</h1>
      </div>
      <div class="text-document-content">
         {!! $page->page_description !!}
      </div>
   </div>
</section>
@endsection