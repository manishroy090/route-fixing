<!DOCTYPE html
   PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <style type="text/css">
            table, th, td {
              border: hidden;
            }
            tbody tr:nth-child(odd) {
              background-color: #fff;
            }

            tbody tr:nth-child(even) {
              background-color: #eee;
            }
         </style>
   </head>
   <body>
      <div>
         <p><b>Hi {{ $details['name'] }}</b>,</p>
         <p>
            Your account on {{ env("DISPLAY_NAME","HAMRO QR MENU") }} has been created. Please use this password <b>"{{ $details['password'] }}"</b> with email <b>"{{ $details['email'] }}"</b> to login to your account. We strongly recommend you to change your password after first login.
         </p> 
         <p>
               <a href="{{ route('frontend.login') }}">Login</a>
         </p>
         
         <p>
            <small>Note:This email is auto-generated from {{ env("DISPLAY_NAME","HAMRO QR MENU") }}. Please do not reply this email.</small>
         </p>
      </div>
   </body>
</html>