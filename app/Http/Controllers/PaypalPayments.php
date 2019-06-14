<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

use Auth;

use Session;

use DB;

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

	  	$request->session()->put('pricefinal',  $price);

	   	$data = $this->paymentData($this->price);

		$response = $provider->setExpressCheckout($data);

		return redirect($response['paypal_link']);
   }
  
	protected function paymentData ($price){


		$data = [];
		$data['items'] = [
		    [
		        'name' => "Question Heading",
		        'price' => $price,
		        'qty' => 1
		    ],
		    
		];

		//$data['name'] = Auth::user()->username;

		$data['invoice_id'] = \Session::get('receiptNo');

		$this->invoiceID = $data['invoice_id']; 

		$data['invoice_description'] = "Payment for an Essay";

		$data['return_url'] = route('paypal-callback');

		$data['cancel_url'] = route('paypal-error');

		$data['total'] = $price;

		return $data;

	}

	public function PayWithPaypalCallback (Request $request)
	{
		$provider = new ExpressCheckout;

		$token = $request->token;

		$price = \Session::get('pricefinal');

		$data = $this->paymentData($price);

		$PayerID = $request->PayerID;

		$response = $provider->getExpressCheckoutDetails($token);

		$invoiceID = $response['INVNUM'] ?? \Session::get('receiptNo');
		
		$response = $provider->doExpressCheckoutPayment($data, $token, $PayerID); //Failure

		$response = $provider->getTransactionDetails($token);

		$qID = \Session::get('question_id');

		//update payments on database 

		//dd(session()->all());

		DB::table('question_matrices')->where('question_id', Session::get('question_id') )
		->update(
			[
				'paid' => 1,
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			]
		);


		return redirect()->route('home');
		
	}

  
   
}


