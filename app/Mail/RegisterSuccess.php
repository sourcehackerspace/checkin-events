<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Bookmark;

class RegisterSuccess extends Mailable
{
    use Queueable, SerializesModels;

    private $bookmark;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bookmark $bookmark)
    {
        $this->bookmark = $bookmark;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->bookmark->user;
        $event = $this->bookmark->event;
        return $this->view('emails.registered')
                    ->with('user', $user)
                    ->with('event', $event)
                    ->subject('Confirmación de Registro');
    }
}
