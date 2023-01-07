<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->id = $user->id;
        $this->app_url = config('app.url');
        $this->url = "{$this->app_url}/invitation?following_user_id={$this->id}";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
            ->subject('テストタイトル')
            ->view('mail')
            ->with([
                'name' => $this->name,
                'url' => $this->url,
            ]);
    }
}
