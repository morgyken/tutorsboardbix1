<?php

namespace App\Http\Controllers;
use DB;
use Storage;
use Response;
use Session;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\PaymentRequest;

class TutorPaymentController extends Controller
{

   public static function TutorNextPayment ()
    {
            // Check if it is Thurs
           $today = new Carbon(); 

           $date = \Carbon\Carbon::today()->subDays(8);   

         //  dd($date);  
    

            $tutor_payment = DB::table('question_details')
            
           ->join('question_matrices', 'question_details.question_id', '=', 

               'question_matrices.question_id')

            ->where('question_matrices.status', '=','answered')

            ->where( 'question_matrices.updated_at', '>', $date )

            ->where('question_matrices.user_id', '=', Auth:: User()->id)

           // -> get();

            ->sum('question_details.tutor_price');

           //dd($tutor_payment);

            return $tutor_payment;
            
        }

        public static function TutorTatalPayment ()
    {
            // Check if it is Thurs
           $today = new Carbon(); 

           $date = \Carbon\Carbon::today()->subDays(8);           
    

            $tutor_payment = DB::table('question_details')
            
           ->join('question_matrices', 'question_details.question_id', '=', 

               'question_matrices.question_id')

            //->where('question_matrices.status', '=','assigned')

            //->orWhere('question_matrices.status', '=','revision')

            ->where( 'question_matrices.updated_at', '>', $date )

            ->where('question_matrices.user_id', Auth::User()->id)

            //-> get();

            ->sum('question_details.tutor_price');

            //dd($tutor_payment);

            return $tutor_payment;
            
        }
        public function ApprovePayments(Request $request){
            //uopdate the matrices table

            DB::table('question_matrices')->where('status', 'processed')
            ->update(
                [   
                    'status' => 'paid',
                    'updated_at'    => \Carbon\Carbon::now()->toDateTimeString(),
                ]);

                //then update the payment request table
                DB::table('payment_requests')->where('request_id', $request->request_id)
            ->update(
                [   
                    'status' => 'paid',
                    'updated_at'    => \Carbon\Carbon::now()->toDateTimeString(),
                ]);

         return redirect()->back()->with('message-err', 'Your request was successful!');;
        }

        public function getAllPaymentReq(){

            $requests = PaymentRequest::all();

            $count = count($requests);

            return view ('admin.payment-req',

             ['requests' => $requests, 'reqcount' => $count]);
        }
        public function TutorReqPayments (Request $request){  
            //update the table for payment 
            $request_id = str_random(12);  
            if($request->amount >= 50)
            {
                DB::table('payment_requests')->insert(
                    [
                        'user_id'       => Auth::user()->email,
                        'amount'        => $request->amount,
                        'request_id'    => $request_id,
                        'processed'     => 'processed',
                        'created_at'    =>\Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at'    => \Carbon\Carbon::now()->toDateTimeString(),
                ]);

                //update status to processed all questions answered and not paid to be processed

            DB::table('question_matrices')->where('updated_at', '=>', Carbon::now()->subDays(15)->toDateTimeString())
            ->update(
                [   
                    'status' => 'processed',
                    'updated_at'    => \Carbon\Carbon::now()->toDateTimeString(),
                ]);

            } 
            else 
            {
                return redirect()->back()->with('message-err', 'Your request was not successful, try again later!');
            }         
                

        return redirect()->back() ->with('message-success', 'Your request was successful!');
        }
    }
