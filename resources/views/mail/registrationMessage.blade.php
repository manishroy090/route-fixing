<!DOCTYPE html
   PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
   <body>
      <div>
         <p><b>Hello,</b><p>
         <p>
            A new Online Registration has been received. Please find the details below
         </p>
         <p>Name: {{ $data['first_name'] }}  {{ $data['last_name'] }} </p>
         <p>Email: {{ $data['email'] }} </p>
         <p>Contact Number: {{ $data['phone'] }} </p>

         @if($data['message'] != '')
            <p>Message : {{ $data['message'] }} </p>
         @endif
         
         <p>Thank You!</p>
         <p>
            <small>Note:This email is auto-generated from {{ env('APP_NAME') }}. Please do not reply this email.</small>
         </p>
      </div>
   </body>
</html>
