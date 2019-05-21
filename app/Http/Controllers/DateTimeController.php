<?php

namespace App\Http\Controllers;

use DB;

use Carbon;

class DateTimeController extends Controller
{

    public static function UpdateDeadline(){

        $data = DB::table('post_question_prices')
                      ->select('question_id', 'question_deadline')->get();                   

      foreach ($data as $key => $value) {

        $deadline = self::getDeadlineInSeconds12($value->question_deadline);
        $dead = 0;

        if($deadline > 0){

          $dead = 0 ;
        }
        else 
        {
        
          $dead = 1;
        }

       // echo $dead;

        DB::table('question_matrices')->where('question_id', $value->question_id)
              ->update(
                        [
                            'overdue'   => $dead, 
                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ] 
                      ); 
            }//end foreach     

      }

public static function getDeadlineInSeconds12($deadline){
   

      $TimeStart = strtotime(\Carbon\Carbon::now());

      $TimeEnd = strtotime($deadline);

      $Difference = ($TimeEnd - $TimeStart);

      return $Difference;

    }

    public function ConvertTime12( $seconds){

        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");

        $days = $dtF->diff($dtT)->format('%a');

        if($days> 0){
            return $dtF->diff($dtT)->format('%a days %h hours');
        }
        else {
            return $dtF->diff($dtT)->format('%h hours %i min');
        }



    }

    public function getDeadlineInSeconds1($deadline){


        $deadline = new \Carbon\Carbon($deadline);

        $now = \Carbon\Carbon::now();

        $difference = $deadline -> diffInSeconds($now);

        $TimeStart = strtotime(\Carbon\Carbon::now());

        $TimeEnd = strtotime($deadline);

        $Difference = ($TimeEnd - $TimeStart);

        if($Difference < 0){

            return 'Overdue';
        }



        $interval = $this->ConvertTime12($difference);

        return $interval; // array ['h']=>h, ['m]=> m, ['s'] =>s

    }

    public function getDeadlineInSeconds13($deadline){


        $deadline = new \Carbon\Carbon($deadline);

        $now = \Carbon\Carbon::now();

        $difference = $deadline -> diffInSeconds($now);

        $TimeStart = strtotime(\Carbon\Carbon::now());

        $TimeEnd = strtotime($deadline);

        $Difference = ($TimeEnd - $TimeStart);

        return $Difference;
    }

    public  function TimeDifference ()
    {
        $date = \Auth::user()->created_at;

        $datetime1 = new \DateTime($date);//start time
    
        $datetime2 = new \DateTime('now');//end time
        
        $interval = $datetime1->diff($datetime2);
        
        $diff = $interval->format('%Y years %m months' );//00 years 0 months 0

        return $diff. ' ago';

    }
      
}
