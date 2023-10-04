@extends('frontend.layouts.master')
@section('content')
<section class="page-not-found button-margin-none">
    <div class="container">
        <div class="icons ">
            <i class="fas fa-bug"></i><span>404</span>
        </div>
        <span class="text">Oops! Page not Found</span>
        <p class="text-center center-custom-width">We're sorry, the page you requested could not be found. Please go
            back to the homepage or contact us at {{ env('SUPPORT_EMAIL') }}</p>
        <div class="buttons-wrapper">
            <div class="custom-buttons ">

                <a href="{{ route('frontend.home') }}">homepage</a>
            </div>
            <div class="custom-buttons button-primary">
                <a href="javascript:history.back()">Go back</a>
            </div>
        </div>

    </div>
</section>
@endsection