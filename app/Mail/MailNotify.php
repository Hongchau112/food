<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $trans;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($trans)
    {
        $this->trans = $trans;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hongchau2000st@gmail.com')
            ->view('admin.transactions.send_mail')
            ->subject("Xác nhận đặt hàng thành công");
    }
}
