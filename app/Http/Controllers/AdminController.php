<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\User;

use App\PaymentRequest;

class AdminController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
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
            ->orderBy('question_bodies.created_at', 'desc')

            ->paginate(15);

           // dd($question);
           $requests = PaymentRequest::get();
           $count = $requests->count();

        return view('admin.home', 
            [
                'question' => $question,
                'reqcount' =>$count
            ]
        );
    }

    public function getQuestionPrice()
    {     
    $user1  = Auth::guard('admin')->user();

    return view ('question.ask-question', ['user' => $user1]);
    }
    public function getAlltutors()
    {
        $tutors = User::all() 
        
        ->where('role', 'tutor')
        
        ->where('isactive', 1);

        return view ('admin.tutors', ['tutors' => $tutors]);
    }

    public function getAllamin()
    {
        $admin = User::all() 
        
        ->where('role', 'admin')
        
        ->where('isactive', 1);

        return view ('admin.admin', ['admin' => $admin]);
    }

    public function deactivateTutors (Request $request, $id){

        DB::table('users')->where('id', $id)
        ->update(
        [    
        'isactive' => $request->isactive,    
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

        ]
    );

    return redirect()->back();

    }

    public function addTutors (Request $request)
    {
        DB::table('users')->insert(
            [
                'name'      => $request->name,
                'email'     => $request->email,
                'role'      => $request->role,
                'account_level' => 1,
                'isactive' => 1,
                'remember_token' =>$request->_token,
                'password' => bcrypt('fyfqhxsztqsl63lqqew06uliz'),
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
    return redirect()->back();
    }
    


}
