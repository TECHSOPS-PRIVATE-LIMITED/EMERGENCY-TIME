@component('mail::message')
<style>
    body {
        background-color: #ffffff; /* White background */
        color: #333333; /* Dark text for contrast */
    }
    .otp-code {
        font-size: 24px;
        font-weight: bold;
        color: #ff0000; /* Red color for the OTP code */
        padding: 10px;
        border: 2px dashed #ff0000; /* Dashed border in red */
        border-radius: 5px;
        display: inline-block;
        margin: 20px 0;
    }
    .button {
        background-color: #ff0000; /* Red button background */
        color: #ffffff; /* White text for the button */
    }
</style>

# Password Reset Request

Hello,

You have requested a password reset. Here is your OTP code:

<div class="otp-code">{{ $otp }}</div>

Please enter this code to proceed with your password reset.

@component('mail::button', ['url' => 'https://emergencytime.help/forgot-password', 'color' => 'red'])
Reset Password
@endcomponent

If you did not request this, please ignore this email.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
