<?php

namespace App\Http\Controllers;
use DB;
use Storage;
use Response;
use Session;
use Illuminate\Http\Request;
use Auth;

use Carbon\Carbon;

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

           // -> get();

            ->sum('question_details.tutor_price');

            return $tutor_payment;
            
        }
    }
