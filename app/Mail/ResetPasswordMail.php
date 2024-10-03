<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // Biến chứa thông tin người dùng để gửi vào view
    public $token; // Biến chứa token lấy lại mật khẩu

    /**
     * Create a new message instance.
     */
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('Lấy lại mật khẩu')
                    ->view('emails.reset_password')
                    ->with([
                        'token' => $this->token,
                        'user' => $this->user,
                    ]);
    }
}
