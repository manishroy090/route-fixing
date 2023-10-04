<nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li> 
      
      {{-- <li class="nav-item d-none d-sm-inline-block">
         <a href="#" class="nav-link">Home</a>
      </li>--}}
      
   </ul>
   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      {{-- 
      <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="fa fa-bell"></i>
         <span class="badge badge-warning navbar-badge">15</span>
         </a>
         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
         </div>
      </li>
      --}}
      <ul class="navbar-nav pull-right">
         <li class="nav-item">
            <a class="nav-link" href="{{url('logout')}}"><i class="fa fa-sign-out"></i>Logout</a>
            @php
               $date = \Carbon\Carbon::now()->setTimezone(new DateTimeZone('Asia/Kathmandu'));
            @endphp
            <p class="mb-0">
               <b>{{ $date->format('h:i A') }}, {{$date->format('d M Y') }}</b>
            </p>
            <p class="mb-0 wel-come-message">
               <b>Welcome to Dashboard</b>
            </p>
         </li>
      </ul>
   </ul>
</nav>