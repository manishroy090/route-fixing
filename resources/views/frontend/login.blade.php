@extends('frontend.layouts.user-master')
@section('content')
<section class="authentication">
   <div class="container ">
      <figure class="logo">
         <a class="navbar-brand" href="{{ route('frontend.home') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt="{{ env('DISPLAY_NAME','APP_NAME') }}"></a>
      </figure>
      <div class="authentication-form ">
         <div class="auth-heading">
            <h1 class="auth-tittle">Log In</h1>
            <p>You do not have an account? <a href="{{ route('frontend.register') }}"> Register now</a></p>
         </div>
         
          @include('frontend.partials.message')

         <form action="{{ route('frontend.merchant.login') }}" method="post" autocomplete="off">
            @csrf()
            <div class="field-group">
               <input type="text" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') ? old('email') : '' }}">
               @if($errors->has('email'))
                  <div class="error">
                     {{ $errors->first('email') }}
                  </div>
               @endif
            </div>
            <div class="field-group">
               <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') ? old('password') : '' }}">
               @if($errors->has('password'))
                  <div class="error">
                     {{ $errors->first('password') }}
                  </div>
               @endif
            </div>
            <button type="submit" name="submit">Login</button>
         </form>
         <a class="forgot-passowrd" href="{{ route('user.merchant.forgotPassword') }}">Forgot password</a>
         <div class="social-media-login">
            <span>OR</span>
            <p>Register with social account</p>
            <div class="social-media">
               <div class="facebook ">
                  <a href="{{ route('frontend.socialmedia.login',['facebook']) }}"><i class="fab fa-facebook-f pe-2"></i>
                  Facebook</a>
               </div>
               <div class="google"> <a href="{{ route('frontend.socialmedia.login',['google']) }}"><i class="fab fa-google pe-2"></i>
                  Google</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="right-decor">
      <figure>
         <img src="{{ asset('frontend/images/images (30).png') }}" alt="">
      </figure>
   </div>
   <div class="left-decor">
      <figure>
         <img src="{{ asset('frontend/images/images (29).png') }}" alt="">
      </figure>
   </div>
</section>
@endsection