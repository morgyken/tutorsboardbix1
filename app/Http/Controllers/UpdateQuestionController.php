<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;
use Response;
use Session;
use App\CreditCardDetails;
use App\Transaction;
use App\MakePaymentModel;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

class UpdateQuestionController extends FileUploadController
{
    //post comments 
    private $user;

    
    public function UpdateQuestionStatus(Request $request, $question)
    {
        /**
         * Cancel Question here
         */

        $this->user = Auth::user()->name;

      
        if($request->update =='optout'){

             $this-> UpdateQuestion('new', $question);
        
        }        

        if($request->update ==='revision'){
               
            $this-> UpdateQuestion('revision', $question);


        }

        if($request->update =='accept-ans'){
            //change status to accepted 

          $this-> UpdateQuestion('completed', $question); 

          //handle question Ratings

          $ratings = $request->ratings;

          $this-> UpdateQuestion('Rated', $question, $ratings); 


        }
        
       if($request->update =='post-ans'){
            //file uploads

            $file = Input::file('file');
             $dest = public_path().'/storage/uploads/'.$question.'/answer/';

            $this->UploadFiles($file, $dest);
            
           //update status 

           $this-> UpdateQuestion('answered', $question);

         }


    if($request->update =='reassigned'){

        DB::table('assign_questions')->where('question_id', $question)->delete();

      }

      return redirect()->back();
    }

            
    public function UpdateQuestion($status, $question, $rated = null)
    {
        $message= '';

        //use this for Ask uestion->Assign Question-> answer-question-> Accept answer
        //                                                           -> put on revision
        //                                                           -> Withdraw Question 
        //                                                           -> reassign Question 
        //Accept answwer means question paid 
        //put on revision -----Same tutor// Assign to same tutor
        // Reassign --- Give another tutor-- Bring it back for another selection
        // Recommended tutor check on that

        switch ($status) {
            case 'update':
                $message = $this->user. " Has Opted out of the uestion!"; 
                break;

                 case 'revision':
                $message = $this->user. " Has Opted out of the uestion!"; 
                break;

                case 'Assigned':
                $message = $this->user. " The Question has been Assigned!"; 
                break;

                 case 'accept-ans':
                $message = $this->user. " Congrats! Your Answer has been accepted"; 
                break;
                 case 'Rated':
                $message = $this->user. " Your Answer has been Rated!"; 
                break;
                 case 'answered':
                $message = $this->user. " Please Check your Question has been Answered!"; 
                break;
                 case 'reassigned':
                $message = $this->user. " The Question was Reassigned!"; 
                break;
                 case 'update':
                $message = $this->user. " THe Question has been Updated !"; 
                break;
            
            default:
                # code...
                break;
        }

          DB::table('question_matrices')->where('question_id', $question)
                    ->update(
                    [     
                                           
                        'status' =>$status,

                        'message' =>$message,

                        'user_id' => Auth::user()->id, 
                                             
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );        

                    
            DB::table('question_history_tables')
                ->insert(
                    [       
                                             
                        'status' =>$status,

                        'question_id' => $question,

                        'user_id' => Auth::user()->id,

                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

                //save data to the revision table 

               DB::table('revisions_table ')
                ->insert(
                    [       
                                             
                        'question_id' => $question,

                        'revision_id' => rand(98999,999999),

                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );
          }

    }

    

