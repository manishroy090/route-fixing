@extends('frontend.layouts.user-master')
@section('content')
<section class="authentication">
   <div class="container ">
      <figure class="logo">
         <a class="navbar-brand" href="{{ route('frontend.home') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt="{{ env('DISPLAY_NAME','APP_NAME') }}"></a>
      </figure>
      <div class="authentication-form ">
         <div class="auth-heading">
            <h1 class="auth-tittle">Create an Account</h1>
            <p>Already have an account? <a href="{{ route('frontend.login') }}">Login here</a></p>
         </div>
         
         @include('frontend.partials.message')

         <form action="{{ route('frontend.merchant.register') }}" method="post" autocomplete="off">
            @csrf()
            <div class="field-group">
               <input type="text" class="form-control" placeholder="Business Name" name="name" value="{{ old('name') ? old('name') : ''}}">
               @if($errors->has('name'))
                  <div class="error">
                     {{ $errors->first('name') }}
                  </div>
               @endif
            </div>
            <div class="field-group">
               <input type="text" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') ? old('email') : ''}}" />
               @if($errors->has('email'))
                  <div class="error">
                     {{ $errors->first('email') }}
                  </div>
               @endif
            </div>
            <div class="field-group">
               <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ old('phone') ? old('phone') : ''}}" />
               @if($errors->has('phone'))
                  <div class="error">
                     {{ $errors->first('phone') }}
                  </div>
               @endif
            </div>
            <div class="field-group">
               <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') ? old('password') : ''}}" />
               @if($errors->has('password'))
                  <div class="error">
                     {{ $errors->first('password') }}
                  </div>
               @endif
            </div>
            <div class="field-group">
               <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" value="{{ old('confirmpassword') ? old('confirmpassword') : ''}}" />
               @if($errors->has('confirmpassword'))
                  <div class="error">
                     {{ $errors->first('confirmpassword') }}
                  </div>
               @endif
            </div>

            <div class="field-group terms-condition">
               <input type="checkbox" id="terms-condition" name="terms_condition" value="Agree" @if(old('terms_condition') == 'Agree') {{ 'selected' }} @endif />

               <label  for="terms-condition"> I have read and agree to our <a href="{{ route('frontend.page',['terms-of-use']) }}" target="_blank">Terms Of Use</a> and <a href="{{ route('frontend.page',['privacy-policy']) }}" target="_blank">Privacy Policy.</a></label>

               @if($errors->has('terms_condition'))
                  <div class="error">
                     {{ $errors->first('terms_condition') }}
                  </div>
               @endif

            </div>

            

            <button type="submit" class="register_merchant_account"> Create an account</button>
         </form>
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