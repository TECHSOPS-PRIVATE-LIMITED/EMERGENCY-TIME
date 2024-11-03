<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp; // Assign the OTP to a public property
    }

    public function build()
    {
        return $this->view('emails.otp') // Point to your email view
                    ->with(['otp' => $this->otp]) // Pass the OTP to the view
                    ->subject('Your OTP Code'); // Set the email subject
    }
}
