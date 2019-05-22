<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Auth;

use App\MessagesModel;

use Illuminate\Support\Facades\Input;

class UserMessageController extends Controller
{
    private $messageid;

public function PostMessages(Request $request, $question){

    $this->messageid = rand(99999,999999);

    //if title is the answer, then delete it from the revision table

    if($request->title = 'Answer')
    {

       DB::table('revisions_table')->where('question_id', $question)->delete(); // assign questions 

       $status = 'answered'; 



    DB::table('question_matrices')->where('question_id', $question)
                ->update(
                [              
                    'status' =>$status,        

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
    }
    else
    {
        DB::table('messages_models')->insert(
                [      
                    'message' => $request->text,

                    'title' => $request->title,
                    
                    'question_id' => $question,
                    
                    'role' =>Auth::user()->role,
                    
                    'messageid' => $this->messageid,            
                    
                    'user' => Auth::user()->name,            
                    
                    'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                    
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);

    }

        //upload files 

        $path = public_path().'/storage/uploads/'.$question.'/response/'.$this->messageid;

        // auth file uploads 

        $this->FileUploads($request, $path);

        //return files details 

        return redirect('/question_det/'.$question);
    }
     
     
    public function delete(Request $request){    

        MessagesModel::where('id', $request->id) ->delete();   
                   
        return redirect()->route('question_det', ['question_id' =>$request->qid,]);    
    }

    public function update(Request $request, $question){    

        $item = ItemModel::find($request->id); 

        $item->message =$request->text;
        
        $item->save();

        return redirect()->route('question_det', ['question_id' =>$request->qid,]);     
    }

    public function FileUploads(Request $request, $path){

        /*
         * The state of the school
         */

         $file = Input::file('file');

        $dest = $path;

        foreach ($file as $files){

            $name =  $files->getClientOriginalName();

            $files->move($dest, $name);

            }
      }

 

}

