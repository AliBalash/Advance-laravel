<?php

namespace App\Billing;


use Illuminate\Support\Str;

class CreditPaymentGateway implements PaymentGatewayContract
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
        $fees = $mount * 0.03;
        //charge the bank
        return [
            'mount' => $mount,
            'discount' => $this->discount,
            'total' => $mount - $this->discount + $fees,
            'confirmation' => Str::random(),
            'currency' => $this->currency,
            'fees' => $fees,

        ];

    }

    public function discount($mount)
    {
        $this->discount = $mount;
    }

}
