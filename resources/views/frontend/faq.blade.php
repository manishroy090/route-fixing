@extends('frontend.layouts.master')
@section('content')


<section class="breadcrumbs-section">
    <div class="breadcrumbs-section-wrapper">
        <div class="container">
            <div class="page-heading">    frequently asked questions (FAQ)</div>
        </div>
    </div>
</section>
<section class="faq-pages custom-margin">
    <div class="container">
        @if($faqs->isNotEmpty())
        <h1 class="section-heading">frequently asked questions (FAQ)</h1>
        <div class="accordion" id="accordionExample">
            @foreach($faqs as $index=>$faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{$index}}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                        {{ $faq->faq_question }}
                    </button>
                </h2>
                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ ($index==0)? " show":"" }}"
                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {!!$faq->faq_answer!!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if(($faqs->links()))
        <div class="col-sm-12 col-md-12 col-lg-12 mt-5">
            {{ $faqs->links() }}
        </div>
        @endif
    </div>
    @else
    <div class="col-sm-12 col-md-12 col-lg-12">
        <p>No Faq/s</p>
    </div>
    @endif
    </div>
</section>
@endsection