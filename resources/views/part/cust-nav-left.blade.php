<div class="col-lg-3">
                        
                        <div class="blog_right_sidebar">
                            
                            <aside class="single_sidebar_widget author_widget">
                                <img class="author_img img-fluid" src="{{ URL::asset('opium/img/blog/author.png ')}}" alt="">
                                <h4>Charlie Barber: Student</h4>
                                <h5>Total number of Questions </h5>
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-github"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                                <div class="br"></div>
                                
                                <h4> </h4>
                                <article class="blog_style1"; style="text-align: center;">
                               
                               <a href="#" class="btn btn-primary btn-md btn-rounded mb-4" data-toggle="modal" data-target="#BecomeTutor"><h3>Become a tutor </h3></a>
                            </article>

                                <div class="br"></div>
                            </aside>                           
                     
                        </div>
                    </div>

                    <div class="modal fade bottom" id="BecomeTutor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                    <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
                    <div class="modal-dialog modal-frame modal-bottom col-xl-10" role="document">


                    <div class="modal-content">
                        <div class="modal-body">
                        <div class="modal-header ">
                                <h4 class="modal-title" id="exampleModalLongTitle">Become a tutor</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>



                        <div class="row d-flex justify-content-center align-items-center">
                        <p> Fill the following details to apply, your application will be considered immediately. Note that when you become a tutor, you cannot post questions anymore!

                            <div class="col-xl-2">

                            </div>
                            <div class="col-xl-8">
                                <form method="post" action="{{route('tutor.applications')}}"  enctype="multipart/form-data">

                                <div class="form-group">
                                    <input type="" placeholder="Area of Expertise" class="form-control"   name="qualification">
                                </div>
                                <div class="form-group">
                                    <input type="" placeholder="Course Undertaken" class="form-control"   name="course">
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

                                <div class="form-group">
                                    <input type="" placeholder="Paypal Email" class="form-control"   name="paypalemail">
                                </div> 
                                <div class="form-group">
                                    <input type="" placeholder="phone contact" class="form-control"   name="phone">
                                </div>                            
                                    
                                <div class="form-group">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Continue</button>
                                </div>
                            </form>

                            </div>
                    <div class="col-xl-2">
                    
                    </div>
                            
                        </div>
                        </div>
                    </div>
                    </div>
                </div>