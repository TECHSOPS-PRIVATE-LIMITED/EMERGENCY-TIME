@component('mail::message')
# Your OTP Code

Your OTP code for password reset is: **{{ $otp }}**

Please use this code to proceed with your password reset.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
