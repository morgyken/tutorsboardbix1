@extends('layouts.layout-home')

@section ('content')



<?php


    function ConvertTime12( $seconds){

        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");

        $days = $dtF->diff($dtT)->format('%a');

        if($days> 0){
            return $dtF->diff($dtT)->format('%a d %h hrs');
        }
        else {
            return $dtF->diff($dtT)->format('%h hrs %i min');
        }



    }

    function getDeadlineInSeconds1($deadline){


        $deadline = new \Carbon\Carbon($deadline);

        $now = \Carbon\Carbon::now();

        $difference = $deadline -> diffInSeconds($now);

        $TimeStart = strtotime(\Carbon\Carbon::now());

        $TimeEnd = strtotime($deadline);

        $Difference = ($TimeEnd - $TimeStart);

        $interval = ConvertTime12($difference);

        return $interval; // array ['h']=>h, ['m]=> m, ['s'] =>s

    }

    function getDeadlineInSeconds12($deadline){


        $deadline = new \Carbon\Carbon($deadline);

        $now = \Carbon\Carbon::now();

        $difference = $deadline -> diffInSeconds($now);

        $TimeStart = strtotime(\Carbon\Carbon::now());

        $TimeEnd = strtotime($deadline);

        $Difference = ($TimeEnd - $TimeStart);

        return $Difference;
    }
    ?>

    
</script>
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120 single-post-area">
            <div class="container">
                <div class="row">   
                <hr class="type_1">  

                    @include('part.nav-left-tutor')

                      <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">           
                            <article class="blog_style1"; style="text-align: center; ">
                                
                                <a class="logo" href="#"><img src="{{ URL::asset('opium/img/logo.png ')}}" alt=""></a>
                            </article>
                            <hr>
                            
                          
                            <article class="blog_style1 claerfix";">
                                
                                <div class="blog_text">
                                    <div class="blog_text_inner">

                                        <div class="card row">
                                        <div class="card-header">
                                            Available Questions
                                        </div>
                                        <?php    $counter =1 ; ?>

                                         
                                          @foreach($question as $value)

                                           <?php  $array_of_deadline = getDeadlineInSeconds1($value->question_deadline);

                                                $deadline12 = getDeadlineInSeconds12($value->question_deadline);

                                              

                                                ?>  
                                      

                                            <ul class="list-group list-group-flush clearfix">
                                                <li class="list-group-item" >
                                                    <div class="row"> 
                                                          <div class="col-md-1">

                                                            {{ $counter}}
                                                            <?php
                                                            $counter++;                                                             

                                                            ?>
                                                          </div>
                                                        <div class="col-md-2">
                                                       <a href="{{route('user-question_det', ['question_id' => $value->question_id])}}"> {{ $value->question_id }} </a>
                                                        </div> 

                                                         <div class="col-md-7" style="text-align: left;font-size:92%;">
                                                            <p> 
                                                                <?php echo strip_tags(html_entity_decode($value->order_summary)); ?>

                                                            </p> 
                                                        </div> 
                                                         <div class="col-md-2" style="font-size: 75%; padding: .1em; ">
                                                           <span class="badge badge-info ">Ksh. {{$value->tutor_price * 94}}</span>
                                                             <span class="badge badge-warning" style="    font-size:75%;">{{ $array_of_deadline }}</span>
                                                        </div>
                                                    </div>

                                                                                                  
                                          

                                                </li>
                                            </ul>
                                
                                                                
                                               @endforeach
                                     

                                        </div>
                                        <h5>{{ $question->links() }}            


         
                                    </h5>
                      
                                        
                                    </div>
                                </div>
                            </article>
                            
                            
                            </div>
                            </div>
                       
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="modal fade bottom" id="frameModalBottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
            <div class="modal-dialog modal-frame modal-bottom col-xl-10" role="document">


              <div class="modal-content">
                <div class="modal-body">
                  <div class="modal-header ">
                        <h4 class="modal-title" id="exampleModalLongTitle"> Post your Question</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>



                  <div class="row d-flex justify-content-center align-items-center">

                  
                    <div class="col-xl-12">
                        <form method="post" action="{{route('post-questions')}}"  enctype="multipart/form-data">

                        <div class="form-group">
                          <input type="" placeholder="Topic" class="form-control"   name="topic">
                        </div>
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                          @include('part.editor')
                      </div>
                      

                    <div class="form-group">       
                
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    Browse&hellip; <input type="file" name='file[]' class="form-control"  multiple>
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                                
                              
                    <div class="form-group">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Continue</button>
                </div>
                    </form>

                    </div>
                      
                  </div>
                </div>
              </div>
            </div>
          </div>

                                             
        <script type="text/javascript">
            
            $(document).on('change', '.btn-file :file', function() {
              var input = $(this),
                  numFiles = input.get(0).files ? input.get(0).files.length : 1,
                  label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
              input.trigger('fileselect', [numFiles, label]);
            });

            $(document).ready( function() {
                $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
                    
                    var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;
                    
                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) alert(log);
                    }
                    
                });
            });
        </script>                   

       
        <!--================Blog Area =================-->
        
        @endsection 