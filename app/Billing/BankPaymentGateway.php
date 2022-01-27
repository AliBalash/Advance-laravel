<?php

namespace App\Billing;


use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{

    private $currency;
    private $discount; //500

    public function __construct($currency,$discount)
    {
        $this->currency = $currency;
        $this->discount = $discount;
    }


    public function charge($mount)
    {
        //charge the bank
        return [
            'mount' => $mount,
            'discount' => $this->discount,
            'total' => $mount - $this->discount,
            'confirmation' => Str::random(),
            'currency' => $this->currency,

        ];

    }

    public function discount($mount)
    {
        $this->discount = $mount;
    }

}
