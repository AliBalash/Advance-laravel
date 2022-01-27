<?php

namespace App\FacadesTest;

use Illuminate\Support\Facades\Mail;

class PostCartSendingService
{

    private $country;
    private $width;
    private $height;

    public function __construct($country, $width, $height)
    {
        $this->country = $country;
        $this->width = $width;
        $this->height = $height;
    }


    public function sendEmail($message,$email)
    {
        Mail::raw($message,function ($message)use ($email){
            $message->to($email);
        });


        dump('Post cart send with the massage: ' . $message);

    }

}
