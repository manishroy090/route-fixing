<!DOCTYPE html
   PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
   <body>
      <div>
         <p><b>Hello</b>,</p>
         <p>A new order has been placed in {{ env('DISPLAY_NAME') }} with order number <b>{{ $details['order_number'] }}</b>. Please find the order invoice attached with this email. 
         <p>Thank You!</p>
         <p>
            <small>Note:This email is auto-generated from {{ env('DISPLAY_NAME') }}. Please do not reply this email.</small>
         </p>
      </div>
   </body>
</html>