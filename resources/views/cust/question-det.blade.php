@extends('layouts.layout-cust')

@section ('content')

<style type="text/css">
.down-files
{
    margin-left: 50px;
    background: #D3D3D3;
    font-stretch: semi-expanded;
    font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
    font-size:18px;
    color:fff;
    padding:5px;
}
    hr{
    border: 0;
    margin-top: 20px;
    margin-bottom: 20px;
    height: 2px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}
</style>
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120 single-post-area">
            <div class="container">
                <div class="row"> 

                  
                    @include('part.cust-nav-left')
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="main_blog_details">
                                    <div class="logo_part">
                                        <div class="container">
                                            <a class="logo" href="#"><img src="{{ URL::asset('opium/img/logo.png')}}" alt=""></a>
                                        </div>
                                    </div>
                            <hr>
                            <h4> {{ ($question->summary) }} </h4>
                            <div class="user_details">
                                <div class="float-left">
                                    <div class="card">
                                      <div class="card-body">
                                        <a href="#">User ID: {{ $question->user_id }} | 
                                        Posted: {{$question->created_at }}
                                        
                                         | {{$question->pagenum }} pages </a>
                                         <a href="#"> {{$question->order_subject }}

                                        | {{ $question->paper_type }}  </a>
                                        
                                        <a href="#">Subject: {{$question->spacing }} 
                                        | {{$question->paper_format }}
                                        | {{$question->lang_style }} </a>

                                        <a href="#">Pages: {{ $question->tutor_price }} |  
                                        {{ $question->academic_level }} | 
                                       
                                        {{ $question->status }} </a>

                                         <a href="#">Urgency: {{ $question->urgency }} | Deadline: {{ $question->question_deadline }} </a> 

                                          <a href="#">Question ID: {{ $question->question_id }} </a> 

                                           <a href="#">Bids: {{ $bids }} </a> 
                                      </div>
                                    </div>
                                    
                                </div>
                        
                                <div class="float-left" style="margin-top:30px;">
                                    <div class="media">
                                        
                                    </div>
                                </div>
                            </div>
                     
                            {!! htmlspecialchars_decode($question-> question_body) !!}             
                             
                            <div class="news_d_foot``````er">                               
                               <h5> File Uploads  </h5>
                            </div>

                            @foreach($files as $file)

                                    <p class="down-files"><a href="{{route('user-download',
                                                    [
                                                        'question_id' => $question->question_id,
                                                        'filename'=>$file['basename']
                                                     ])}}"
                                        >
                                    <i class="icon-download-alt">{{$file['basename'] }} </i></a>   
                                    </p>
                            @endforeach

                                   
                        @if($status ==='new')
                            <div class="news_d_footer" style="background:yellow">                               
                               <h5> The Order is Still available </h5>
                            </div>
                        @elseif($status === 'answered')
                            <div class="news_d_footer" style="background:green; color:#fff">                               
                               <h5> Your Answer is available! </h5>
                            </div>
                        @elseif($status === 'revision')
                            <div class="news_d_footer" style="background:#e88651; color:#fff">                               
                               <h5> Your Answer is available! </h5>
                            </div>
                        @else
                       
                            <div class="news_d_footer" style="background: #88b0ef; color: white">                               
                               <h5> The Order has been assigned to {{$tutor}} </h5>
                    
                            </div>
                        @endif            
                        
                            <div class="news_d_footer">                               
                               <h5> Conversation History </h5>
                                </div>

                                <div class="comments-area">
                                    @foreach($messages as $comm)

                                    @if($comm->title == 'Answer')                            
                                    <div class="comment-list" style="background:#98ef8b; padding: 10px; border-radius: 5px">
                                    @else
                                    <div class="comment-list">
                                    @endif
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="{{ URL::asset('opium/img/blog/c1.jpg ')}}" alt="">
                                                </div>
                                                <div class="desc">
                                                    <p><h5><a href="#">{{ $comm -> role}} </a>
                                                    
                                                    Type: {{ $comm -> title}} </h5></p> 

                                                    <p class="date">{{ $comm->created_at }}: {{ $comm->title }} </p>
                                                    <p class="comment">
                                                       {{ $comm->message }}
                                                    </p>
                                                </div>                                            

                                            </div>                                    
                                        </div>
                                    

                                    <?php 
                                    $resfiles = \App\Http\Controllers\UserQuestionController::ResponseFiles($question->question_id,  $comm->messageid);

                                    ?>
                                    <div class="col-md-12"> 
                                        <p class="comment"> Click Below to download your files! </p>
                                        @foreach($resfiles as $file)

                                            <p class="down-files"><a href="{{route('response-download',
                                                            [
                                                                'question_id' => $question->question_id,
                                                                'messageid' => $comm->messageid,
                                                                'filename'=>$file['basename']
                                                             ])}}"
                                                >
                                            <i class="icon-download-alt">{{$file['basename'] }} </i></a>   
                                            </p>
                                        @endforeach 
                                    </div>
                                </div>       
                            
                            
                                    @endforeach  
                                    
                                    </div>                                                              
                                </div>
                                <div class="comment-form">

                                    <h5>Post Answer/Leave a Comment</h5>

                                    <form action="{{ route('user-messages', ['question' =>$question->question_id])}}" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        
                                        <div class="form-group">
                                            <label>Send Message to: </label>

                                            <input type="radio" name="title" value="Tutor"> Tutor  
                                            <input type="radio" name="title" value="Admin"> Admin  
                                                                            
                                            <input type="hidden" name="qid" value="{{$question->question_id}}">
                                        </div>
                                        <div class="form-group">
                                            

                                            <textarea class="form-control mb-10" rows="5" name="text" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                        </div>
                                            <div class="form-group"> 
                                            <span> Choose File (Optional)</span>      
                                        
                                                <div class="custom-file">

                                                    <input type="file" name="file[]" class="form-control" multiple>                                            
                                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                  </div>
                                            </div>      
                                      
                                        <button class="primary-btn submit_btn">Post Comment</button>
                                    </form>
                                </div>
                                <div class="comment-form" style="background:#30593d; padding: 10px; border-radius: 5px">

                                <form action="{{ route('user-messages', ['question' =>$question->question_id])}}" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        
                                        <div class="form-group">


                                            <input type="radio" class="col-md-6" name="title" value="Tutor"> Mark as Complete 
                                            <input type="radio"  class="col-md-6" name="title" value="Admin"> Recomend revision                                                                    
                                        </div>
                                    
                                        <button class="btn btn-warning btn-block" type="submit">Mark as complete</button>
                                </form>
                            </div>
                                                   
                    </div>
                </div>
            </div>
        </div>
        </section>

        
        @endsection