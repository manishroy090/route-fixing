<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <div>

        <p>
            <b>Hello,</b>
            {{ ucfirst($data['name']) }} has sent appointment enquiry for the date  {{ \Carbon\Carbon::parse($data['appointment_date'])->format('F d Y') }} at {{ $data['appointment_time']  }}:
        </p>

        <p>
            Address: {{ $data['address'] }}
        </p>
        <p>
            Email: {{ $data['email'] }}
        </p>
        <p>
            Phone: {{ $data['number'] }}
        </p>

        <p> {{ $data['message'] }}</p>

        <p>Thank You!</p>
    </div>
    <br />
    <small>Note:This email is auto generate from {{ env('APP_NAME') }}. Please do not reply this email.</small>
</body>
</html>
