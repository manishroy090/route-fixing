@extends('frontend.layouts.master')
@section('after-title')

@endsection
@section('content')
<section class="breadcrumb-all">
    <div class="container">
        <div class="breadcrumb-wrapper">
            <div class=" breadcrumb-heading">Contact us</div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Contact us</li>
            </ol>
        </div>
    </div>
</section>
<section class="custom-margin contact-us-page">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12">
                <div class="section-header-wrapper">
                    <div class="section-sub-heading">
                        The Truly Asia
                    </div>
                    <h1 class="section-main-heading">Happy to heard from you</h1>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in</p>
                <div class="contact-information">
                    <ul>
                        <li>
                            <div class="wrapper">
                                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="details">
                                    <div class="tittle">Location </div>
                                    <span>Maitidevi, Setopool, Kathmandu</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="wrapper">
                                <div class="icon-box"><i class="fas fa-envelope"></i></div>
                                <div class="details">
                                    <div class="tittle">Email Address </div>
                                    <span><a href="">info@truelyasia.com</a>,<a href="">care@truelyasia.com</a></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="wrapper">
                                <div class="icon-box"> <i class="fa-solid fa-phone"></i></div>
                                <div class="details">
                                    <div class="tittle">Phone </div>
                                    <span><a href="">619-270-8578</a>,<a href="">+(977) 1987 123 88</a></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <form action="" class="send-message-form form-element">
                    <div class="section-header-wrapper">
                        <div class="section-sub-heading">
                            Contact us
                        </div>
                        <div class="section-main-heading">Get in touch</div>
                    </div>
                    <div class="row gy-4">
                        <div class="col-lg-6 col-sm-12 col-md-6">
                            <input type="text" class="form-control" placeholder="full name" id="fullname">
                            <div class="error-message">Name is required.</div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6">
                            <input type="text" class="form-control" placeholder="Phone Number " id="number">
                            <div class="error-message">Phone Number is required.</div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="email" class="form-control" placeholder="E-mail Address" id="email">
                            <div class="error-message">E-mail Address is required.</div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <textarea name="message" class="form-control" id="message" rows="5" placeholder="Your Message"></textarea>
                            <div class="error-message">Message is required.</div>
                        </div>
                    </div>
                    <div class="custom-button ">
                        <button type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="google-map custom-margin">
    <div class="container">
        <div class="google-location">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.463180330673!2d85.3330176149302!3d27.70298193229092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199f75f08da5%3A0x641a4463533be28c!2sUltrabyte%20International%20Pvt.%20Ltd!5e0!3m2!1sen!2snp!4v1670410862398!5m2!1sen!2snp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    @section('after-footer')
    @endsection
    @endsection