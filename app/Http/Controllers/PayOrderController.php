<?php

namespace App\Http\Controllers;

use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{

    /*
             * call orderDetails class Caused create new object from PaymentGateway because in service provider bind this class
             * BUT if service provider set singleton any ones call class PaymentGateway this is return one object and save data
             * and removed last object and data
             * if we don't call class orderDetails on other class causer save data and return object without dependency
            */

    public function store(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway)
    {


//        $paymentGatway->discount(500);

        $order = $orderDetails->detail();
        $p = dd($paymentGateway->charge(2500));


    }
}










