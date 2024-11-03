@component('mail::message')
<style>
    .otp-code {
        font-size: 24px;
        font-weight: bold;
        color: #007bff; /* Bootstrap primary color */
        padding: 10px;
        border: 2px dashed #007bff;
        border-radius: 5px;
        display: inline-block;
        margin: 20px 0;
    }
</style>

# Password Reset Request

Hello,

You have requested a password reset. Here is your OTP code:

<div class="otp-code">{{ $otp }}</div>

Please enter this code to proceed with your password reset.

@component('mail::button', ['url' => 'http://emergencytime.help'])
Reset Password
@endcomponent

If you did not request this, please ignore this email.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
