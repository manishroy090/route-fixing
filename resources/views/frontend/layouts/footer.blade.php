<footer class="custom-margin">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6">
                <div class="column-heading">Truely Asia</div>
                <ul>
                    <li><a href="about-us.php">About us</a></li>
                    <li><a href="restaurent.php">Restaurants and Bars</a></li>
                    <li><a href="service.php">Our Services</a></li>
                    <li><a href="gallery.php">Captured Memories</a></li>
                    <li><a href="">Himalayan Rocks Treks and Adventure </a></li>
                    <li><a href="contact-us.php">Contact us</a></li>
                    <li><a href="page.php">Terms and Conditions</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="column-heading">Our Room & Suits</div>
                <ul>
                    <li><a href="room-details.php">Single Rooms</a></li>
                    <li><a href="room-details.php">Double Rooms</a></li>
                    <li><a href="room-details.php">Junior Suite</a></li>
                    <li><a href="room-details.php">Superior Room</a></li>
                    <li><a href="room-details.php">Triple Room</a></li>
                    <li><a href="room-details.php">Family Room</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 ">
                <div class="column-heading">Our Room & Suits</div>
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
            <div class="col-lg-3 col-md-6">
                <div class="column-heading">Association With</div>
                <div class="association-wrapper">
                    <figure class="association-card">
                        <a href=""><img src="images/img-9.jpg" alt=""></a>
                    </figure>
                    <figure class="association-card">
                        <a href=""><img src="images/img-10.png" alt=""></a>
                    </figure>
                </div>
                <div class="social-media mt-5">
                    <div class="column-heading">Follow us:</div>
                    <ul>
                        <li><a class="facebook" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li><a class="twitter" href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a class="instagram" href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li><a class="linkedin" href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right">
        <div class="container">
            <div class="wrapper">
                <p>Copyright © {{ date('Y') }}. {{ env('APP_NAME','Truely Asia') }} All Rights Reserved.</p>
                <p>Crafted by: <a href="{{ env('DEVELOPER_LINK', 'https://ultrabyteit.com') }}" target="_blank">{{ env('DEVELOPER_NAME', "ULTRABYTE") }}</a></p>
            </div>
        </div>
    </div>
</footer>

@yield('after-footer')
<!-- jquery  -->
<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
<!-- fontawsome -->
<script src="{{ asset('frontend/js/kit.fontawesome.js') }}" crossorigin="anonymous"></script>
<!-- date and time picker  -->
<script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
<!-- bootstrap  -->
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<!-- owl-carousel -->
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<!-- custom js file  -->
<script src="{{ asset('frontend/js/main.js') }}"></script>
<!-- facncy-box js file  -->
@yield('script')