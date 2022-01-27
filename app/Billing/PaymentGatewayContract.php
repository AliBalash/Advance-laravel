<?php

namespace App\Billing;

interface PaymentGatewayContract
{
    public function charge($mount);

    public function discount($mount);
}
