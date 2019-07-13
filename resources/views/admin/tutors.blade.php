@extends('layouts.layout-admin')

@section ('content')

        <!--================Blog Area =================-->
        <section class="blog_area p_120">
            <div class="container">
                <div class="row">   
                <hr class="type_1">  

                    @include('part.nav-left')

                      <div class="col-lg-9">
                        <div class="blog_left_sidebar">
                            <article class="blog_style1"; style="text-align: center; ">
                                
                                <a class="logo" href="#"><img src="{{ URL::asset('opium/img/logo.png ')}}" alt=""></a>
                            </article>

                             <article class="blog_style1"; style="text-align: center;">
                               
                               <a href="#" class="btn btn-secondary btn-lg btn-rounded mb-4" 
                               data-toggle="modal" data-target="#addTutor"><h3>Add Tutor </h3></a>

                               <a href="#" class="btn btn-secondary btn-lg btn-rounded mb-4" 
                               data-toggle="modal" data-target="#addAdmin"><h3>Add Admin </h3></a>
                            </article>
                          
                            <article class="blog_style1";">
                                
                                <div class="blog_text">
                                    <div class="blog_text_inner">

                                        <div class="card row">
                                        <div class="card-header">
                                           All Tutors 
                                        </div>
                                         
                                          @foreach($tutors as $value)
                                            <ul class="list-group list-group-flush clearfix">
                                                <li class="list-group-item" >
                                                    <div class="row"> 
                                                        <div class="col-md-2">
                                                       <a href=""> {{ $value->id}} </a>
                                                        </div> 

                                                         <div class="col-md-3" style="text-align: left;font-size:92%;">
                                                            <p> {{ $value ->name }}</p> 
                                                        </div> 
                                                         <div class="col-md-3">                                                         
                                                           <p> {{ $value ->email}}</p> 
                                                        </div>
                                                        <div class="col-md-4">                                                         
                                                           <p> {{ $value ->created_at}}</p> 
                                                        </div> 
                                                         <div class="col-md-4"> 
                                                         <form method='post' action="{{ route('inactivate.tutor',
                                                         ['id' => $value->id])}}">
                                                          @csrf
                                                              <input type='hidden' name= 'isactive' value='0'> 
                                                              <button type="submit" class="btn btn-warning">Deactivate</button>
                                                         </form>                                                        
                                                           <p> </p> 
                                                        </div>                                                        
                                                    </div>                                                                                              
                                          

                                                </li>
                                            </ul>
                                
                                                                
                                               @endforeach
                                     

                                        </div>                             
                                    </h5>
                      
                                        
                                    </div>
                                </div>
                            </article>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <div class="modal fade bottom" id="addTutor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
            <div class="modal-dialog modal-frame modal-bottom col-xl-10" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle"> Post your Question</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  <div class="row d-flex justify-content-center align-items-center">                  
                    <div class="col-xl-12">
                        <form method="post" action="{{route('add-tutors')}}"  enctype="multipart/form-data">

                        <div class="form-group">
                          <input type="" placeholder="Name" class="form-control"   name="name">
                        </div>
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                          <input type="" placeholder="Email" class="form-control"   name="email">
                        </div>               

      
                          <input type="hidden" placeholder="Role" class="form-control"  value="tutor"  name="role">
                 
                                     
                              
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

          <div class="modal fade bottom" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
            <div class="modal-dialog modal-frame modal-bottom col-xl-10" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle"> Post your Question</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  <div class="row d-flex justify-content-center align-items-center">                  
                    <div class="col-xl-12">
                        <form method="post" action="{{route('add-tutors')}}"  enctype="multipart/form-data">

                        <div class="form-group">
                          <input type="" placeholder="Name" class="form-control"   name="name">
                        </div>
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                          <input type="" placeholder="Email" class="form-control"   name="email">
                        </div>       
                        <input type="hidden"  value="admin"  name="role">                               
                              
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
        
        @endsection 

