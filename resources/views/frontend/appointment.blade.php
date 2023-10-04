@extends('frontend.layouts.master')
@section('content')
    <section class="breadcrumbs-section">
        <div class="breadcrumbs-section-wrapper">
            <div class="container">
                <div class="page-heading"> Make Appointment</div>
            </div>
        </div>
    </section>

    <section class="appointment-pages custom-margin">
        <div class="container">
            <h1 class="section-heading">{{ $section_heading->appointment_title }}</h1>
            <div class="lower-heading-short-description">
                <p>{{ $section_heading->appointment_content }} </p>
            </div>
            <div class="appointment-form form-frame">
                <h1 class="section-heading">Appointment Form</h1>
                <form class="contact-us-form" action="{{ route('frontend.appointment_store') }}" method="POST"
                    autocomplete="off" id="appointment_form">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" placeholder="Name" name="name" id="name">
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" placeholder="Address" name="address" id="address">
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" placeholder="Phone" name="number" id="number">
                            
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <input type="text" placeholder="Email" name="email" id="email">
                            
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <input type="text" class="dateData" placeholder="Appointment date" name="appointment_date"
                                id="appointment_date">
                            
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <input type="text" class="timeData" placeholder="Appointment time" name="appointment_time"
                                id="appointment_time">
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <textarea cols="30" rows="6" placeholder="Message" id="message" name="message"></textarea>
                            
                        </div>
                    </div>
                    <div class="custom-buttons">
                        <button type="submit" class="appointment_btn">Make Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection