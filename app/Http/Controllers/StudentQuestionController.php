<?php

namespace App\Http\Controllers;


use App\QuestionStatusModel;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DB;
use Storage;
use App\AcademicLevel;
use Response;
use Session;
use App\AcceptQuestion;
use App\AssignQuestion;
use App\CreditCardDetails;
use App\Transaction;
use App\QuestionCategories;
use App\User;
use App\PostComments;
use App\MakePaymentModel;
use App\DateTimeModel;
use App\PostAnswer;
use App\PostQuestionModel;
use App\PostQuestionPrice;
use App\QuestionMatrix;
use App\SuggestDeadline;
use App\SuggestPriceIncrease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\FileUploadController;
use App\AdminModel;
use Illuminate\Support\Facades\Auth;
use App\ MessagesModel;

class StudentQuestionController extends Controller
{
    /*
    * Get the question starts, used in the view for links
    */

     public function __construct()
    {
        $this->middleware('web');
    }

    public static function questionStat($column)
    {
        //$user = Auth::user()->email;
        $user= 'morgyken@gmail.com';

        $countAssigned = DB::table('question_matrices')->select($column)
        ->where('user_id',$user)
        ->where($column, 1)
        ->get();

        return  count($countAssigned);
    }
    /*
     * Suggest Price Increase here
     * The real course the price
     */

    public function PayRequests(Request $request){

        $request_id = Input::get('checkbox');

        if(is_array($request_id)) {
            foreach ($request_id as $request => $val) {
                DB::table('payment_requests')->where('request_id', $val)
                    ->update(
                        [
                            'status' => 'paid',
                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ]
                    );
            }
        }

        return redirect()->route('adm-tut-payments');
    }

    public function PostPaymentRequest(Request $request, $amount){

        $request_id = str_random(12);

        $user_id = Auth::user()->email;

        DB::table('payment_requests')->insert(
            [
                'user_id' => Auth::user()->email,
                'amount' => $amount,
                'request_id' => $request_id,
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);

        $questions = Session::get('questions');

        foreach($questions as $comm => $val){
            DB::table('post_question_prices')->where('question_id', $val)
                ->update(
                    [
                        'paid' => 1,
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

        }

            return redirect()->route('tut-profile', ['email'=>$user_id]);
    }

    public function suggestPricePrice(Request $request, $question)
    {
        $quest = new SuggestPriceIncrease;

        /*
         * Get the question ID
         * Insert using Eloquent
         * Get question ID
         */

        $quest->question_id = $question;

        /*
         * Getcomments bodyformthe post
         * create the post date
         */

        $quest->suggested_price = $request->input('suggested_price');

        /*
         * Getcomments bodyformthe post
         * create the post date
         */

        $quest->user_id = Auth::user()->email;
        $quest->save();

        return redirect()->route('question.det', ['question_id'=> $question]);
    }

    /*
     * file download from the view
     * $qeustion is the question iD
     * File name is the passed file name
     * $type can be questron or answer folder
     */

    public function downloads($question, $fileName){

            $dest = public_path().'/storage/uploads/'.$question.'/question/'.$fileName;

            return Response::download($dest);
    }

    public function ResponseDownloads($question, $messageid, $fileName){

          $dest = public_path().'/storage/uploads/'.$question.'/response/'.$messageid.'/'.$fileName;

          return Response::download($dest);
    }

    

    /*
     * comments files download
     */

    public function CommentFilesDownload($question, $fileName, $commentid){

        $path = public_path().'/storage/uploads/'.$question.'/comments/'.$comment_id.'/'.$fileName;

        return Response::download($path);
    }

    public static function CommentFiles($comment_id, $question_id){


        $path_comm = public_path().'/storage/uploads/'.$question_id.'/comments/'.$comment_id;

        $manuals = [];

        $filesInFolder = \File::files($path_comm);



        foreach($filesInFolder as $path)
        {
            $manuals [] = pathinfo($path);
        }


        return $manuals;

    }

    // question details

    public static function getDeadlineInSeconds12($deadline){


      $TimeStart = strtotime(\Carbon\Carbon::now());

      $TimeEnd = strtotime($deadline);

      $Difference = ($TimeEnd - $TimeStart);

      return $Difference/3600;

    }

    public function NewQuestionDetails($question_id)
    {

      $user =  AdminModel::where('id', Auth::user()->id);

      $messages = MessagesModel::where('question_id', $question_id)->get();

       $question =  DB::table('question_bodies')
            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')
            ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id')

            ->where('question_details.question_id', '=', $question_id)

            ->first();

        $time = new DateTimeModel();

        /*
        * return the comments in the following
        *
        */
        $bids = DB::table('question_bids')
                  ->select('bidpoints')->where('question_id', $question_id)
                  ->orderby('bidpoints')
                  ->get();


        //get the count of bids 

        $bids =count ($bids);

        $interval = $time->getDeadlineInSeconds($question_id);

        //question files 
        $path_question = public_path().'/storage/uploads/'.$question_id.'/question/';


        $filesInFolder = \File::files($path_question);

            foreach($filesInFolder as $path)
            {
                $manuals[] = pathinfo($path);
            }

        //Given the following 

        $tutor= '';


        $status =  DB::table('question_matrices')
                    ->select('status')
                    ->where('question_id', $question_id)
                    ->first();


        if($status == null)
        {
          $status = '';
        }
        else 
        {

        $status = $status->status;
        }

      //  dd($status);

      if(Auth::check())
       {
                return view ('cust.question-det',
                  [
                    // class for html data


                    'class' =>  $user,

                    'user' => $user,

                    'question' => $question,
                    /*
                     * Get user type here, include messages
                     */

                    'files'=>$manuals,
                    /*
                     * Get diference in time
                     */
                    'difference' => $interval,

                    //assigned
                    'status'   => $status,
        
                    'tutor'   => Auth::User()->name,

                    //bids

                    'bids' => $bids,

                    //messages

                    'messages' => $messages,

                    //'commfiles' => $comm_files


                  ]);

       }
       else{
            return redirect()-> route('general');
       }
    }

    //bid points function

    public function CalculateBidpoints(){

      //use number of Questions


      //use how long the person has been on the website (age of the account)


      //let tutors be on fire!!!


      //calculate success rate

      //Check number of questions anwered

    }

    // Return Question Details 

    public static function ResponseFiles($question_id, $messageid)
    {

        // path 
        $path =public_path().'/storage/uploads/'.$question_id.'/response/'.$messageid;

        if(file_exists ($path))
        {
             $filesInFolder = \File::files($path);

            foreach($filesInFolder as $path)
            {
                $manuals[] = pathinfo($path);
            }
            return $manuals;
        }

        else {
           return array();
        }

     

        
    }

   // count question matrices
    public function GetBids($question_id)
    {

        //get bids, let all bids to be automatched

        $bids = DB::table('question_bids')->select('bidpoints')

                    ->where('question_id',$question_id)->get();

        //return bids
        return count($bids);
    }

    
    public function increaseDeadline(Request $request, $question)
    {
        $quest = new SuggestDeadline;

        /*
         * Get the question ID
         * Insert using Eloquent
         * Get question ID
         */

        $quest->question_id = $question;

        /*
         * Getcomments bodyformthe post
         * create the post date
         */

        $quest->question_deadline= $request->input('question_deadline');

        /*
         * Getcomments bodyformthe post
         * create the post date
         */

        $quest->user_id = Auth::user()->email;
        $quest->save();

        return redirect()->route('view-question', ['question_id'=> $question]);

    }


    /*
     * Files data to database here I dream
     */

    public function Information(Request $request){


    }

    public function  PostComments(Request $request, $question){
        $comments_id = rand(1000, 9999);

        $path=  public_path().'/storage/uploads/'.$question.'/comments/'.$comments_id;

        $this-> FileUploads($request, $path);

        /*
         * Give comments an IDentificatiion Number
         */

        $path1 = '/storage/uploads/'.$question.'/comments/'.$comments_id;

        DB::table('post_comments')->insert(
            [
                'comment_body' => $request['comment_body'],
                'comments_id' =>$comments_id,
                'question_id' =>$question,
                'message_type'=>$request->commtype,
                'user_id' => Auth::user()->email,
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);

        return redirect()->route('view-question', ['question_id'=> $question]);
    }

    /*
     * Use this function to update question status history
     */

    public function QuestionStatusHistory($database, $question,$mess){

            DB::table($database)->insert(
                [
                    'status' => $mess,
                    'question_id' =>$question,
                    'user_id' => Auth::user()->email,
                    'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);

        return redirect()->route('view-question', ['question_id'=> $question]);

    }

    /*
     * Update status here
     */

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

    //Question Status

    /*
    public function  PostAnswer(Request $request, $question){

        //file uploads

        $file = Input::file('file');

        $dest = public_path().'/storage/uploads/'.$question.'/answer/';

            foreach ($file as $files){
                $name =  $files->getClientOriginalName();
                $files->move($dest, $name);
            }

        /*
         * Update the question status


            $this->UpdateQuestionStatus($request, $question);

        //Insert into database

       DB::table('post_answers')->insert(
            [
                'overdue' => '0',
                'question_id' =>$question,
                'user_id' => Auth::user()->email,
                'answered' => 1,
                'answer_body' => $request['answer_body'],
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);

        //update status

        $this->Status($question, 'answered');

        return redirect()->route('view-question', ['question_id'=> $question]);

    }
    */

    public function questionAll()
    {
        /*
         * Quesry Database here for all questions
         */
        $questions = DB::table('post_question_models')->get();
        /*
         * return Question Blog
         */

        return view('questions.question-blog', ['question' => $questions]);
    }

    public function getAskQuestion()
    {
        /*
         * Select distinct form table Questions
         */

        return view('questions.ask-question');

    }

    public function askPriceDeadline(Request $request)
    {
        $username = Auth::user()->email;
        $question_id =  $value = session('question_id');

        return view('questions.ask-deadline',['username'=>$username, 'question_id'=> $question_id] );

    }

    public function viewQuestion(){

        return view('quest.question-det');
    }

        /*
         * use this to delete string
         */
    public static  function delete_all_between($beginning, $end, $string) {
        $beginningPos = strpos($string, $beginning);
        $endPos = strpos($string, $end);
        if ($beginningPos === false || $endPos === false) {
            return $string;
        }

        $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

        return str_replace($textToDelete, '', $string);
        }

    /*
     * View Deadline post
     */

    public function postdeadlinePrice(){

      $academic_level = DB::table('academic_levels')
                      ->select('academic-level')
                      -> get();

              return view('quest.ask-deadline-1',['category'=> $this->getQuestionCategories()]);
        }

    /*
     * Open View to post questions
     */
    public function getQuestionCategories(){
      $category = QuestionCategories::select('category')

                ->get();

        return $category;
    }


    public function postQuestions(){

        return view('quest.ask-question',['category' => $this->getQuestionCategories()]);
    }

    public function generateRandomString() {
        $length = 12;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


}
