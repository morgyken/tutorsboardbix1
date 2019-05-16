<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QuestionStatusModel;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DB;
use Storage;
use App\Http\Controllers\PaymentController;
use Response;
use Session;
use App\AcceptQuestion;
use App\AssignQuestion;
use App\CreditCardDetails;
use App\Transaction;
use App\User;
use App\PostcommentModel;
use App\MakePaymentModel;
use App\DateTimeModel;
use App\PostAnswer;
use App\PostQuestionModel;
use App\PostQuestionPrice;
use App\SuggestDeadline;
use App\SuggestPriceIncrease;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

class CustomerAskQuestionController extends Controller
{
    public function __costruct()
    {
        $this->middleware('QuestionOverdue');
    }

   

//Make payments 

     public function GetMakePayments(){
        $user =  User::where('email', Auth::user()->email) ->first();
            
        $role = $user->user_role;

        return view('payment.payment-det', ['role' => $role, 'user'=> $user]);

    }

    
    public function postQuestion(Request $request)
    {
        $question_id = rand (99999,999999); 
        

        $number_of_words = rand (120,150);

        $summary =  strip_tags(substr($request->question_body,0, $number_of_words));

        /*
         *
         * file picker starts here
         */

        $file = Input::file('file');

        if(is_array($file)){

            $dest = public_path().'/storage/uploads/'.$question_id.'/question/';

            foreach ($file as $files){
                /*
                 * loop through multiple files
                 */
                $name =  $files->getClientOriginalName();
                $files->move($dest, $name);
            }

        }
        else 
            {
                //show error
            }

        /*
         * Insert into database
         */

        DB::table('question_bodies')->insert(
            [
                'question_body' =>  htmlspecialchars($request['question_body']),
                'user_id'   => Auth::user()->id,
                'topic'     => $request->topic,
                'question_id' => $question_id,
                'summary' => htmlspecialchars($summary),
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

            ]);

        DB::table('question_history_tables')->insert(
            [
                'question_id' =>$question_id,
                'status' => 'new',
                 'user_id'   => Auth::user()->id,
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);

        DB::table('question_matrices')->insert(
            [
                'question_id' =>$question_id,
                'status' => 'new',
                 'user_id'   => Auth::user()->id,
                 'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        //post the question on the question ratings table 

        DB::table('question_details')->insert(
            [
               'question_id' =>$question_id, 
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);

        //init Questions assignment to tutors 

       $request->session()->put('question_id',  $question_id);

        // store session amount

        $request->session()->put('order_summary', substr($request['question_body'], 0, 200));

        //redirect to post deadline view

     

       return redirect() -> route('cust-deadlinePrice');
    }


    public function CustpostQuestionDetails(Request $request)
    {
        /*
         * Insert into database
         */

        $question  = $request-> session()->get('question_id');

        DB::table('question_details')->where('question_id', $question)
                ->update(
                    [    
                'tutor_price' => round(24.8 * (int)substr($request['question_price'], 2)/100,0, PHP_ROUND_HALF_UP),
                //'tutor_price' =>  $request['tutor_price'],
                'urgency' => $request->urgency,
                 
                'question_id'    => $request->session()->get('question_id'),
                'pagenum'    => $request->pagenum,
                'order_subject' => $request->order_subject,
                'paper_type' => $request ->paper_type,
                'academic_level'    => $request->academic_level,
                'spacing' => $request['spacing'],
                'paper_format' => $request->paper_format,
                'lang_style'    => $request->lang_style,
                'question_price' => substr($request->question_price,2),
                'university' => $request->university,
                'order_summary' =>htmlspecialchars($request->session()->get('order_summary')),

                'question_deadline' => $request->question_deadline,
                
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

            ]);

        $request->session()->put('question_price', 

                $request->question_price  
            );
        
          //output formated question price

          $request->session()->put('price12',  

                substr($request->question_price,2)
            );


        $request->session()->put('question_deadline', 

                $request->question_deadline  
            );

        $receiptNo = rand(9999999,99999999);

        $today =  \Carbon\Carbon::now()->toDateTimeString();

        //add receipt number to session

        session(['receiptNo' => $receiptNo, 'receiptDate' => $today]);

     
        //redirect to payment with paypal


        return redirect() -> route('viewMakePayments');
    }

    public function postPayment(Request $request)
   {


       $email=  $request->session()->get('email');
      // Set your secret key: remember to change this to your live secret key in production

      \Stripe\Stripe::setApiKey("sk_test_wR9YngHY8kyTzEcixpqikNT6");

      // Token is created using Checkout or Elements!
      // Get the payment token ID submitted by the form:
        $token = $request->stripeToken;
        $question_id = $request->session()->get('question_id');



          $charge = \Stripe\Charge::create([
          'amount' =>100* substr($request->session()->get('question_price'),2),
          'currency' => 'usd',
          'description' => 'Payment for Essay',
          'source' => $token,
           'metadata' => ['order_id' => $question_id, 'username' => Auth::user()->name], 
           'email' => Auth::user()->email

      ]);

        DB::table('question_matrices')->where('question_id', $question_id )
                ->update(
                    [        
                                             
                        'status' =>'Paid',
                        'user_id' => Auth::user()->email,                      
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );
         


      return redirect()->route('home');
   }

    public function CustgetQuestionPrice()
    {
     
    $user1  = Auth::user();

    return view ('cust.ask-question', ['user' => $user1]);
    
 }

   
}
