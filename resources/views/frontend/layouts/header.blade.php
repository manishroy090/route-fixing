<header>
    <div class="container">
        <div class="navigation-bar">
            <div class="logo">
                <figure>
                    <a href="{{ route('frontend.home') }}">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="{{ env('APP_NAME','Truely Asia') }}">
                    </a>
                </figure>
            </div>
            <nav>
                <ul>
                    <li class="active"><a href="{{route('frontend.home')}}">Home</a></li>
                    <li><a href="{{route('frontend.rooms')}}">Rooms</a></li>
                    <li><a href="{{route('frontend.restaurants')}}">Restaurants and Bar</a></li>
                    <li><a href="{{route('frontend.services')}}">Services</a></li>
                    <li><a href="{{route('frontend.contactus')}}">Contact us</a></li>
                    <li><a href="{{route('frontend.aboutus')}}">About us</a></li>
                </ul>
            </nav>
            <div class="hamburger-menu">
                <a href="javascript:void(0);" data-side-nav-target="#mySideNav" class="sideNavOpen">
                    <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="ep:menu">
                            <path id="Vector" d="M7.8125 21.875C7.3981 21.875 7.00067 21.7104 6.70765 21.4174C6.41462 21.1244 6.25 20.7269 6.25 20.3125V7.81567C6.25 7.40127 6.41462 7.00385 6.70765 6.71082C7.00067 6.41779 7.3981 6.25317 7.8125 6.25317H20.3125C20.7269 6.25317 21.1243 6.41779 21.4174 6.71082C21.7104 7.00385 21.875 7.40127 21.875 7.81567V20.3125C21.875 20.7269 21.7104 21.1244 21.4174 21.4174C21.1243 21.7104 20.7269 21.875 20.3125 21.875H7.8125ZM29.6875 21.875C29.2731 21.875 28.8757 21.7104 28.5826 21.4174C28.2896 21.1244 28.125 20.7269 28.125 20.3125V7.81567C28.125 7.40127 28.2896 7.00385 28.5826 6.71082C28.8757 6.41779 29.2731 6.25317 29.6875 6.25317H42.1844C42.5988 6.25317 42.9962 6.41779 43.2892 6.71082C43.5823 7.00385 43.7469 7.40127 43.7469 7.81567V20.3125C43.7469 20.7269 43.5823 21.1244 43.2892 21.4174C42.9962 21.7104 42.5988 21.875 42.1844 21.875H29.6875ZM7.8125 43.75C7.3981 43.75 7.00067 43.5854 6.70765 43.2924C6.41462 42.9994 6.25 42.602 6.25 42.1875V29.6875C6.25 29.2731 6.41462 28.8757 6.70765 28.5827C7.00067 28.2897 7.3981 28.125 7.8125 28.125H20.3125C20.7269 28.125 21.1243 28.2897 21.4174 28.5827C21.7104 28.8757 21.875 29.2731 21.875 29.6875V42.1875C21.875 42.602 21.7104 42.9994 21.4174 43.2924C21.1243 43.5854 20.7269 43.75 20.3125 43.75H7.8125ZM29.6875 43.75C29.2731 43.75 28.8757 43.5854 28.5826 43.2924C28.2896 42.9994 28.125 42.602 28.125 42.1875V29.6875C28.125 29.2731 28.2896 28.8757 28.5826 28.5827C28.8757 28.2897 29.2731 28.125 29.6875 28.125H42.1844C42.5988 28.125 42.9962 28.2897 43.2892 28.5827C43.5823 28.8757 43.7469 29.2731 43.7469 29.6875V42.1875C43.7469 42.602 43.5823 42.9994 43.2892 43.2924C42.9962 43.5854 42.5988 43.75 42.1844 43.75H29.6875Z" fill="#A9505B" />
                        </g>
                    </svg>
                </a>
            </div>

        </div>
    </div>
</header>
<div id="mySideNav" class="sidenav">
    <div class="side-nav-close-btn">
        <a class="sideNavClose" data-side-nav-target="#mySideNav"><i class="fa-solid fa-xmark"></i></a>
    </div>
    <div class="side-nav-body">
        <div class="navigation-links">
            <div class="side-nav-heading">Quick Links</div>
            <ul>
                <li><a href="page.php">Hotel Maintenance</a></li>
                <li><a href="page.php">Safety and Security in Hotels</a></li>
                <li><a href="page.php">Cancellation Policy</a></li>
                <li><a href="page.php">Pet Policy</a></li>
                <li><a href="page.php">Terms of Use</a></li>
                <li><a href="page.php">Privacy Policy</a></li>
                <li><a href="">Himalayan Rocks Treks and Adventure</a></li>
            </ul>
        </div>
        <div class="contact-information">
            <div class="side-nav-heading">Contact Information</div>
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
                        <div class="icon-box"><i class="fas fa-blender-phone"></i></div>
                        <div class="details">
                            <div class="tittle">Phone </div>
                            <span><a href="">619-270-8578</a>,<a href="">+(977) 1987 123 88</a></span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="side-nav-footer">
        <div class="wrapper">
            <span>Govt .Regd. No: 88177/068/070 </span>
            <span>Hotel Regd. No:1505</span>
        </div>
    </div>
</div>