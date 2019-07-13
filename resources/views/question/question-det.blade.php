@extends('layouts.layout-home')

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
                  
                    @include('part.nav-left')
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
                                      </div>
                                    </div>
                                    
                                </div>
                        
                                <div class="float-right" style="margin-top:30px;">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5>Morgyken </h5>
                                            <p>12 Dec, 2017 11:21 am</p>
                                        </div>
                                        <div class="d-flex">
                                            <img src="{{ URL::asset('opium/img/blog/user-img.jpg ')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                     
                            {!! htmlspecialchars_decode($question-> question_body) !!}
                            <div class="news_d_footer">   
                                                       
                             <a href="#" class="btn btn-secondary btn-lg btn-rounded mb-4" data-toggle="modal"
                             data-target="#frameModalBottom"><h5 style="color:#FFFFFF">Bids avalibale 14 </h5> </a>

                            </div>

                            <div class="news_d_footer">                               
                               <h5> File Uploads  </h5>
                            </div>

                            @foreach($files as $file)

                                    <p class="down-files"><a href="{{route('file-download',
                                                    [
                                                        'question_id' => $question->question_id,
                                                        'filename'=>$file['basename']
                                                     ])}}"
                                        >
                                    <i class="icon-download-alt">{{$file['basename'] }} </i></a>   
                                    </p>
                            @endforeach
                            <div class="news_d_footer">                               
                               <h5> Conversation History </h5>
                            </div>
                     
                        <div class="comments-area">
                            
                            @foreach($messages as $comm)
                    
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ URL::asset('opium/img/blog/c1.jpg ')}}" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#"> Morgyken</a></h5>
                                               {{ $comm->created_at }}: {{ $comm->title }}
                                            <p class="date"> </p>
                                            <p class="comment">
                                               {{ $comm->message }}
                                            </p>

                                        </div>
                                        
                                    </div>
                                    
                                </div>

                            </div>
                            <?php 
                            $resfiles = \App\Http\Controllers\UserQuestionController::ResponseFiles($question->question_id,  $comm->messageid);

                            ?>
                            <div class="col-md-12"> 
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
                           
                            @endforeach  
                            
                            </div>                                                              
                        </div>
                        <div class="comment-form">

                            <h5>Leave a Comment</h5>

                            <form action="{{ route('messages', ['question' =>$question->question_id])}}" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" name="title">
                                    <input type="hidden" name="qid" value="{{$question->question_id}}">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="text" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                </div>
                                    <div class="form-group"> 
                                    <span> Choose File (Optional)</span>      
                                
                                        <div class="custom-file">

                                            <input type="file" name="file[]" class="form-control">                                            
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                          </div>
                                    </div>      
                              
                                <button class="primary-btn submit_btn">Post Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

        @include('part.bids-part')
        
        @endsection