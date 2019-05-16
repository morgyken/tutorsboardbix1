<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
  
 
    public function index()
    {
        $question=  DB::table('question_bodies')

            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')
            ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id')

            ->where('question_matrices.status', 'new')

            ->orderBy('question_details.question_deadline', 'desc')

            ->paginate(10);

        return view('cust.cust-home', 
            [
                'question' => $question
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

      return view ('admin.tutor-payments', ['paydate' => $payment_date]);
    }


}
