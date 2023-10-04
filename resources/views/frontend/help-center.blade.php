@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section">
   <div class="container">
      <div class="page-tittle">Help Center</div>
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Help Center</li>
         </ol>
      </nav>
   </div>
</section>
<section class="custom-margin frequently-asked-question">
   <div class="container">
      <div class="row gy-4 ">
         <div class="col-lg-5 col-md-12 col-sm-12">
            <figure data-tilt class="hover-tilt">
               <img src="{{ asset('frontend/images/images (2).png') }}" alt="Faq ">
            </figure>
         </div>
         <div class="col-lg-7 col-md-12 col-sm-12">
            @if($faqs->isNotEmpty())
               <div class="heading">
                  <h1 class="title">Do not leave with doubt</h1>
               </div>
               @foreach($faqs as $faq)
               <div class="accordion" id="faqAccordion">
                  <div class="accordion-item">
                     <div class="accordion-header" id="heading{{ $loop->iteration }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                              {{ $faq->faq_question }}
                        </button>
                     </div>
                     <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse {{ ($loop->iteration == 1 ) ? 'show' : '' }}" aria-labelledby="heading{{ $loop->iteration }}"
                        data-bs-parent="#faqAccordion" style="">
                        <div class="accordion-body">
                           
                              {!! $faq->faq_answer !!}
                           
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach

               @if($faqs->hasPages())         
                {{ $faqs->links() }}
               @endif

            @endif
         </div>
      </div>
   </div>
</section>
<section class="overlap-footer-section buttom-margin-none custom-margin">
   <div class="container">
      <div class="heading">
         <h2 class="title text-center">Want to know more?</h2>
      </div>
      <div class=" center-custom-width">
         <p class="text-center">
            {{ getSectionHeadings('help_center_page') }}
         </p>
      </div>
      <div class="button-wrapper mt-5">
         <div class="custom-buttons ">
            <a href="{{ route('frontend.contact') }}">Contact us</a>
         </div>
      </div>
   </div>
</section>
@endsection