<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifUser extends Mailable
{
    use Queueable, SerializesModels;
    public $validatedData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($validatedData)
    {
        $this->validatedData = $validatedData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.notif-user')
                    ->subject('Notifikasi Pegawai PPSDM Regional Bandung')
                    ->with('validatedData', $this->validatedData);
    }
}
