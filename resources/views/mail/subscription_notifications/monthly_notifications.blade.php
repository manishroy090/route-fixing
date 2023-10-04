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
         <p><b>Dear</b> {{ $details['name'] }},</p>
         <p>
            {!! $details['description'] !!}
         </p> 
            @php
               $package = $details['package'];
            @endphp
            @if(!empty($package))
            <table>
               <tr>
                  <td>Package</td>
                  <td>{{ $package['package_subscriptions_title'] }}</td>
               </tr>

               <tr>
                  <td>Price</td>
                  <td>
                     @if($package['package_subscriptions_discount_percent'] > 0)
                        {{ implode(" ",[env("DISPLAY_CURRENCY","NPR"), floatval($package['package_subscriptions_price'])]) }}
                     @else
                        @php
                           $new_discounted_price = ($package['package_subscriptions_price']) - ($package['package_subscriptions_discount_percent']/100) * $package['package_subscriptions_price'];
                        @endphp
                        {{ implode(" ",[env("DISPLAY_CURRENCY","NPR"), floatval($new_discounted_price)]) }}
                     @endif
                  </td>
               </tr>

                <tr>
                  <td>Subscription Type</td>
                  <td>{{ ucfirst(str_replace("-"," ", $package['package_subscriptions_type'])) }}</td>
               </tr>

            </table>

            <p>
               <a href="{{ route('user.merchant.checkout',['type' => 'package', 'value' => $package['package_subscriptions_slug']]) }}">Renew</a>
            </p>
            @endif

         <p>
            <small>Note:This email is auto-generated from {{ env('DISPLAY_NAME') }}. Please do not reply this email.</small>
         </p>
      </div>
   </body>
</html>