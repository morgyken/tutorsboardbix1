<div class="col-lg-3">
                        
                        <div class="blog_right_sidebar">
                            
                            <aside class="single_sidebar_widget author_widget">
                                <img class="author_img img-fluid" src="{{ URL::asset('opium/img/blog/author.png ')}}" alt="">
                                <h4>Charlie Barber: Admin</h4>                                
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-github"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Admin Menu</h4>
                                <ul class="list cat-list">
                                    <li>
                                        <a href=" {{ route('admin.tutors') }}" class="d-flex justify-content-between">
                                            <p>Tutors </p>
                                            <p>7</p>
                                        </a>
                                    </li> 
                                    <li>
                                        <a href=" {{ route('admin.admin') }}" class="d-flex justify-content-between">
                                            <p>Admins </p>
                                            <p>7</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route ('tutor.payment.request') }}" class="d-flex justify-content-between">
                                            <p>Payments </p>
                                            <p>{{$reqcount }}</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>All Questions</p>
                                            <p>44</p>
                                        </a>
                                    </li>                                    
                                    
                                                                                                     
                                </ul>
                            </aside>
                        </div>
                    </div>

       
