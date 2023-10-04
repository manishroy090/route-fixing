@extends('frontend.layouts.menu-master')
@section('content')
<section class="menu-content">
   <div class="container">
      <p class="text-center mt-2 mb-2">{{ $description }}</p>
      
      <div class="custom-buttons text-center">
         <a class="text-center" href="javascript:history.back()">Go back</a>
      </div>
   </div>
</section>
@endsection