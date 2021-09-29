<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IndividualClientLoginMailNotify extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected  $email;
    protected  $secretKey;
    protected  $client;
    protected  $full_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $email, $password, $client, $full_name )
    {
        $this->email      =   $email;
        $this->secretKey  =   $password;
        $this->client     =   $client;
        $this->full_name  =   $full_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail-template.client-login-journey')
                    ->from(Auth::user()->email, Auth::user()->full_name)
                    ->subject(Auth::user()->full_name)
                    ->with([
                        'email'     => $this->email,
                        'secretKey' => $this->secretKey,
                        'client'    => $this->client,
                        'full_name' => $this->full_name,
                    ]);
    }
}