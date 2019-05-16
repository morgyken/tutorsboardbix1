<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Srmklive\PayPal\Services\ExpressCheckout;

use Auth;

use Session;

class PaypalPayments extends Controller
{
	//https://github.com/srmklive/laravel-paypal

	private $price;

	private $invoiceID;

	public function PayWithPaypal(Request $request, $price)
   {
   	
	   $provider = new ExpressCheckout;

	   $price = number_format($price, 2);

	   $this->price = $price;


	   $data = $this->paymentData();



		$response = $provider->setExpressCheckout($data);

		//dd($response);

		return redirect($response['paypal_link']);

   }
  
	private function paymentData (){


		$data = [];
		$data['items'] = [
		    [
		        'name' => "Question Heading",
		        'price' => $this->price,
		        'qty' => 1
		    ],
		    
		];

		//$data['name'] = Auth::user()->username;

		$data['invoice_id'] = $data['invoice_id'] = uniqid();;

		$this->invoiceID = $data['invoice_id']; 
		
		$data['invoice_description'] = "Payment for an Essay";

		$data['return_url'] = route('paypal-callback');

		$data['cancel_url'] = route('paypal-error');

	
		$data['total'] = $this->price;

		return $data;

	}

	public function PayWithPaypalCallback (Request $request)
	{
		$provider = new ExpressCheckout;

		$token = $request->token;

		$data = $this->paymentData($this->price);

		$PayerID = $request->PayerID;

		$response = $provider->getExpressCheckoutDetails($token);

		$invoiceID = $this->invoiceID;
		
		$provider->doExpressCheckoutPayment($data, $token, $PayerID);
		

		// The $token is the value returned from SetExpressCheckout API call

		$response = $provider->createBillingAgreement($token);


		$response = $provider->getTransactionDetails($token);

		if($response['ACK'] == 'Failure')

		 	retturn redirect()-> route('paypal-error');


		return redirect()->route('success');
		
	}

  
   
}


