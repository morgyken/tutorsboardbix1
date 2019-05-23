<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class HomeController extends UserQuestionController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin,web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
  
 
    public function index($params = null)
    {

      //dd($params);

      if($params != null)
      {
        $question=  DB::table('question_bodies')

            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')
            
            ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id')

            ->where('question_matrices.status', $params)

            ->where('question_matrices.user_id', Auth::user()->id)

            ->orderBy('question_details.question_deadline', 'desc')

            ->paginate(10);

      }
      else
      {
        $question=  DB::table('question_bodies')

            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')
            ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id')

            ->where('question_matrices.status', 'new')

            ->where('question_matrices.user_id', Auth::user()->id)

            ->orderBy('question_details.question_deadline', 'desc')

            ->paginate(10);

      }
        




            $question_cust=  DB::table('question_bodies')

            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')
            ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id')

            ->where('question_matrices.user_id', Auth::user()->id)

            ->orderBy('question_details.question_deadline', 'desc')

            ->paginate(10);

          $tutorid = Auth::user()->id;


        $experience1 = new DateTimeController(); // to get the experience of the tutor

        $experience = $experience1->TimeDifference();


         $NoOfQuestions = self::NoOfQuestions($tutorid); // from UserQuestion Controller superclass

         $CountTutorBids = self::CountTutorBids($tutorid); // from UserQuestion Controller superclass

         $CountRevisions = self::CountRevisions($tutorid); // from UserQuestion Controller superclass


          $CountRevisions = $this->CountRevisions();


          $countComplete = $this->CountComplete();


       // dd(Auth::user());
        if(Auth::user()-> role == 'cust')
        {
          return view('cust.home', 
            [
                'question' => $question_cust, 

                'experience' => $experience,

                'NoOfQuestions' => $NoOfQuestions,

            ]
        );

        }

        return view('tutor.home', 
            [
              'question' => $question,

              'experience' => $experience,

              'NoOfQuestions' => $NoOfQuestions,

              'CountTutorBids' => $CountTutorBids,

              'revisions' => $CountRevisions,

              'complete' => $countComplete,
            ]
        );
    }

  public function getQuestionPrice()
    {
     
    $user1  = Auth::guard('admin')->user();

    return view ('question.ask-question', ['user' => $user1]);
    
 }


    public function getTutProfile()
    { 
        $tutor  = session('email');

        $tutor_profile = DB::table ('tutor_accounts')

                        ->where('tutor_id', $tutor)

                        ->first();

        if($tutor_profile != NULL) 
        {
          return view ('tut.tut-profile', $this->GetUser(), 

                        ['tutorprofile' => $tutor_profile]);
        }   
        else
        {
          return view ('tut.tut-profile', $this->GetUser());
        }          
              
    }

    

    public function viewTutorPayment()
    {

      $payment_date = \Carbon\Carbon::parse('this sunday')->toDateString();

      //$number_of_orders = DB::table('')->get();

      return view ('admin.tutor-payments', ['paydate' => $payment_date]);
    }


   //Find sum of the total amount to be paid

       public function NextPayments()
    {
    //completed Questions 

      $sumOfCurrent = DB::table('question_details')

                      ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id') 

                      ->where('user_id', Auth::user()->id)

                      ->where('status', 'Rated')

                      ->orwhere('status', 'rated')

                      ->whereDate('question_matrices.updated_at', '>', \Carbon\Carbon::today()->subDays(14)->toDateString())

                      ->whereDate('question_matrices.updated_at', '<', \Carbon\Carbon::today()->subDays(7)->toDateString())

                      ->sum('tutor_price');

          
          return $sumOfCurrent;

    }



//Find sum of the total amount already earned

       public function TotalEarnedAmount()
    {
    //completed Questions 

      $sumOfCurrent = DB::table('question_details')

                      ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id') 

                      ->where('user_id', Auth::user()->id)

                      ->where('status', 'Rated')

                      ->orwhere('status', 'rated')

                      ->whereDate('question_matrices.updated_at', '<', \Carbon\Carbon::today()->subDays(14)->toDateString())

                      ->sum('tutor_price');

          return $sumOfCurrent;

    }

    //Find sum of the total amount already earned// to be adjusted to 2

       public function CurrentEarnedAmount()
    {
    //completed Questions 

      $sumOfCurrent = DB::table('question_details')

                      ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id') 

                      ->where('user_id', Auth::user()->id)

                      ->where('status', 'Assigned')

                      ->orwhere('status', 'assigned')

                      ->whereDate('question_matrices.updated_at', '>', \Carbon\Carbon::today()->subDays(7)->toDateString())

                      ->sum('tutor_price');

          return $sumOfCurrent;

    }


    //success rate

    public function successRate()
    {

    

      //completed Questions 

      $completed = DB::table('question_history_tables')

                        ->distinct('question_id')

                        ->where('user_id', Auth::user()->id)

                        ->where('status', 'Rated')

                        ->orwhere('status', 'rated')

                        ->orwhere('status', 'answered')

                        ->get();

        $completed = $completed->count();


      $current = DB::table('question_history_tables')

                        ->distinct('question_id')

                        ->where('user_id', Auth::user()->id)

                        ->where('status', 'assigned')

                        ->orwhere('status', 'revision')

                        ->orwhere('status', 'Assigned')

                        ->get();

        $current = $current->count();


        $other = DB::table('question_history_tables')

                        ->distinct('question_id')

                        ->where('user_id', Auth::user()->id)

                        ->where('status', 'reassined')

                        ->orwhere('status', 'Reassined')

                        ->orwhere('status', 'widthdrawn')

                        ->get();


        $other = $other->count();

         $results = array(
                            'current' => $current, 
                            'other' =>  $other,  
                            'completed' =>  $completed
                          );
        
        return $results;

    }

    //get suspensions

    public function GetSuspensions()
    {
      $suspension = DB::table('suspension_models')
                    ->select('mode')
                    ->where('mode', 'suspension')
                    ->get();

      $suspension = $suspension->count();

      return $suspension;
    }

    public function GetPlagiarism()
    {
      $plag = DB::table('suspension_models')
                    ->select('mode')
                    ->where('mode', 'plagiarism')
                    ->get();

      $plag = $plag->count();

      return $plag;
    }


public function GetWidthdrawn()
    {
      $plag = DB::table('suspension_models')
                    ->select('mode')
                    ->where('mode', 'widthdrawn')
                    ->get();

      $plag = $plag->count();

      return $plag;
    }

    //Post suspension via Kennel

    public function PostSuspension()
    {
      $tutor = DB::table('question_history_tables')

              ->select('user_id')

              ->where('status', 'Reassigned')

              ->orwhere('status', 'Widthdrawn')

              ->whereDate('created_at', '>', \Carbon\Carbon::today()->subMonth()->toDateString())

              ->get();

      //change obect to array

      $tutor = (array) $tutor;

      if($this->GetWidthdrawn() > 2 || $this->GetPlagiarism() > 2 ){

      foreach ($tutor as $key => $value) {

        DB::table('suspension_models')->insert(
                [
                    'tutor_id' => $value,

                    'mode' => 'suspended',

                    'user_id' => Auth::user()->id,

                    'message' => 'The user has been suspended for Poor Quality',

                    'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                    
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);
     
        }

      }
      

    }

}
