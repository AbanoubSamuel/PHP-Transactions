<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalPaymentController extends Controller
{
    public function paymentHandle()
    {
        $product = [];
        $product['items'] = [
            ['name' => 'Peter B. test',
                'price' => 50,
                'desc' => 'Running shoes for Men',
                'qty' => 1],
        ];

        $product['invoice_id'] = 1;
        $product['invoice_description'] = "Order #{{$product['invoice_id']} Bill";
        $product['return_url'] = route('payment.success');
        $product['cancel_url'] = route('payment.cancel');
        $product['total'] = 50;

        $paypalModule = new ExpressCheckout;

        $res = $paypalModule->setExpressCheckout($product);

        // Use the following line when creating recurring payment profiles (subscriptions)
        // $res = $paypalModule->setExpressCheckout($product, true);

        dd($res);
        // return redirect($res['paypal_link']);
    }

    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }

    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Payment was successfull. The payment success page goes here!');
        }

        dd('Error occured!');
    }

}
