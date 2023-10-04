@if(Session::has('success'))
   <div class="alert alert-success alert-dismissible show_success_message" role="alert">
      {{ session('success') }}
   </div>
@endif
@if(Session::has('error'))
   <div class="alert alert-danger alert-dismissible show_error_message" role="alert">
      {{ session('error') }}
   </div>
@endif

@if(Session::has('password_success'))
 <div class="alert alert-success alert-dismissible" role="alert">
    {{ session('password_success') }}
 </div>
@endif

@if(Session::has('password_error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
       {{ session('password_error') }}
    </div>
 @endif