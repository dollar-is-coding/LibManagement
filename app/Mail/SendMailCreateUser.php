<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailCreateUser extends Mailable
{
    use Queueable, SerializesModels;
    protected $mailData;
    /**
     * Create a new message instance.
     */
    public function __construct(array $mailData)
    {
        $this->mailData = $mailData;
    }
    public function build()
    {
        $title = $this->mailData['title'];
        $body = $this->mailData['body'];
        $name = $this->mailData['name'];
        $email = $this->mailData['email'];
        $mat_khau = $this->mailData['mat_khau'];
        return $this->subject($title)
            // ->from($fromEmail, $nameAdmin)
            ->view('send_mail.tao_tai_khoan', [
                'body' => $body,
                'name' => $name,
                'email' => $email,
                'mat_khau' => $mat_khau,
            ]);
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
