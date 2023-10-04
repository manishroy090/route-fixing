@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="page-tittle">Talk to us</div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Talk to us</li>
            </ol>
        </nav>
    </div>
</section>
<section class="contact-us custom-margin">
    <div class="container">
        <div class="heading">
            <h2 class="title text-center">Happy to hear from you</h2>
        </div>
        <div class=" center-custom-width mb-5">
            <p class="text-center">
                {{ getSectionHeadings('contactus_page') }}
            </p>
        </div>
        <div class="row gy-4 ">
            <div class="col-lg-5">
                <div class="contact-detail">
                    <div class="contact-detail-head">Contact Details</div>
                    <div class="contact-detail-wrapper">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div class="contact-details-wrapper">
                            <p>phone</p>
                            {!! getClickableLinks($siteSettings->setting_phone_number, "phone" ,"" ,NULL) !!}
                        </div>
                    </div>
                    <div class="contact-detail-wrapper">
                        <div class="icon-wrapper">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div class="contact-details-wrapper">
                            <p>mail info</p>
                            {!! getClickableLinks($siteSettings->setting_email, "email" ,"" ,NULL) !!}
                        </div>
                    </div>
                    <div class="contact-detail-wrapper">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="contact-details-wrapper">
                            <p>Address</p>
                        <span>{{ $siteSettings->setting_address }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                @if ($siteSettings->setting_googlemap != '')
                    {!! updateGoogleMap($siteSettings->setting_googlemap, '475', '100%') !!}
                @endif
            </div>
        </div>
    </div>
</section>

<section class="contact-form custom-margin">
    <div class="form-detail-banner">
        <div class="heading">
            <h2 class="title text-center text-light">Talk to Our Professional Team Now</h2>
        </div>
    </div>
    <div class="container">
        <div class="contact-form-wrapper">

            <div class="alert alert-success alert-dismissible show_success_message" role="alert" style="display: none"></div>
            <div class="alert alert-danger alert-dismissible show_error_message" role="alert" style="display: none"></div>


            <form action="{{ route('frontend.contact.submit') }}" method="post" class="contact-us-form"  id="contact_us_form" autocomplete="off">
                @csrf()
                <div class="contact-form-head">
                Contact us
                </div>
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <label for="name" class="form-label">Name*</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : '' }}" />
                        {{-- <div class="error">Name requried</div> --}}
                    </div>
                    <div class="col-lg-6">
                        <label for="phone" class="form-label">Phone*</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') ? old('phone') : '' }}" />
                    </div>
                    <div class="col-lg-12">
                        <label for="email" class="form-label">Email*</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') ? old('email') : '' }}" />
                    </div>
                    <div class="col-lg-12">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" rows="3" name="message" id="message">{{ old('message') ? old('message') : '' }}</textarea>
                    </div>
                </div>
                <div class="custom-buttons mt-5">
                    <button type="submit" class="contact_us_btn">Send message</button>
                </div>
            </form>
        </div>
    </div>
</section>
  
@endsection