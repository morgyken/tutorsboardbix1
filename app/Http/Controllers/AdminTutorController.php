<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\User;


use App\question_body;

use Illuminate\Support\Facades\Auth;

class AdminTutorController extends Controller
{

	//View all Questions 

	public function AdminQuestionsView ()
    {
     $questions =  DB::table('question_bodies')

            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')  

            ->join(
              'question_matrices', 'question_details.question_id', '=', 
              'question_matrices.question_id'
          )

            ->orderBy('question_bodies.created_at', 'desc')

            ->paginate(25);    

      return view('admin.questions', ['questions'=> $questions]);    

    }

}
