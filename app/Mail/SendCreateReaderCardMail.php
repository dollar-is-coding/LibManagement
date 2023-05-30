<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendCreateReaderCardMail extends Mailable
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
        $title=$this->mailData['title'];
        $ho_ten=$this->mailData['ho'].' '.$this->mailData['ten'];
        $dob=$this->mailData['ngay_sinh'];
        $lop=$this->mailData['lop'];
        $id=$this->mailData['ma_so'];
        $gioi_tinh=$this->mailData['gioi_tinh'];
        $dia_chi=$this->mailData['dia_chi'];
        return $this->subject($title)
        ->view('xac_thuc_email.reader_card',[
            'ho_ten'=>$ho_ten,
            'ma_so'=>$id,
            'lop'=>$lop,
            'dob'=>$dob,
            'gioi_tinh'=>$gioi_tinh,
            'dia_chi'=>$dia_chi,
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
