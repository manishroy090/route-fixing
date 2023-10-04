<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@isset($title) {{ $title }} | @endisset {{ env('APP_NAME') }}</title>
    @yield('after-title')
    <!-- custome cs  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- bootstrap css  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('frontend/images/fev-icon.png') }}" type="image/x-icon">
    <!-- owl-carousel -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <!-- magnific-popup css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <!-- fancybox css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fancybox.css') }}">
    <!-- date and time picker  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}">
</head>

<body data-siteurl="{{ route('frontend.home') }}">
    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')
    <script>
        $(document).on('click', '.menucategory',function(e){
           $url = $(this).data('url');
           console.log($url);
            // $.ajax({
            //     url:'',
            //     method: '',
            //     success:function(response){

            //     },
            //     error:function(error){

            //     }
            // })
        });
    </script>
</body>

</html>