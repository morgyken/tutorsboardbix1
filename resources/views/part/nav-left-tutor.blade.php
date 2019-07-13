                             <?php

                                $total = \App\Http\Controllers\TutorPaymentController::TutorNextPayment();

                                $total2 =\App\Http\Controllers\TutorPaymentController::TutorTatalPayment();

                                ?>
                                <div class="col-lg-3">
                        
                        <div class="blog_right_sidebar">
                            
                            <aside class="single_sidebar_widget author_widget">
                                <a href=" {{ route('profile-pic-view') }}">
                                

                                <img class="author_img img-fluid" max-width=300 src="{{ URL::asset('storage/profile/'.Auth::user()->id.'/profile.jpg')}}" alt="">
                            </a>
                                <h4>{{ Auth::user()->name }}: Tutor</h4>
                            
                                <h5> {{ $experience}}</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-github"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                               
                                <div class="br"></div>
                                <h4> Ksh. {{ $total }}/ {{ $total2}} </h4>
                                <form method='post' action="{{route('request.payments') }}">
                                    @csrf
                                    <input type='hidden' name= 'amount' value={{$total}} > 
                                    <button type="submit" class="btn btn-warning">Request Payment</button>
                                </form>
                                <p> Payments will be processed within 48 hours </p>
                                @if(session()->has('message-err'))
                                <div class="alert alert-warning" role="alert">
                                       {{ session()->get('message-err') }}
                                    </div>                         
                                @endif
                                 @if(session()->has('message-success'))
                                <div class="alert alert-success">
                                    {{ session()->get('message-success') }}
                                </div>
                                @endif


                                <div class="br"></div>
                            </aside>
                            
                            
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Tutor Menu</h4>
                                <ul class="list cat-list">
                                    <li>
                                        <a href=" {{ route('home', ['params' => 'taken']) }}" class="d-flex justify-content-between">
                                            <p>Available</p>
                                            <p> {{ $NoOfAvailable}}</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=" {{ route('home', ['params' => 'taken']) }}" class="d-flex justify-content-between">
                                            <p>Assigned</p>
                                            <p> {{ $NoOfQuestions}}</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p> Bids</p>
                                            <p> {{ $CountTutorBids}}</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home', ['params' => 'revision']) }}" class="d-flex justify-content-between">
                                            <p>For Revision</p>
                                            <p> {{$revisions}}</p>
                                        </a>
                                    </li>                                    
                                    
                                    <li>
                                        <a href="{{ route('home', ['params' => 'answered']) }}" class="d-flex justify-content-between">
                                            <p>Completed</p>
                                            <p> {{$complete}}</p>
                                        </a>
                                    </li>                                  
                                                                                                            
                                </ul>
                            </aside>
                        </div>
                    </div>