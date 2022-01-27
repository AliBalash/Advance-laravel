<?php

namespace App\Orders;

use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;

class OrderDetails
{

    private $paymentGateway;

    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function detail()
    {
        $this->paymentGateway->discount(500);
        return [
            'name' => 'ali',
            'address' => 'pirozi',
        ];

    }

}
