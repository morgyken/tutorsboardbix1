<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ URL::asset('opium/img/favicon.png')}}" type="image/png">
        <title>Tutorsboardbiz</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ URL::asset('opium/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('opium/vendors/linericon/style.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('opium/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('opium/vendors/owl-carousel/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('opium/vendors/lightbox/simpleLightbox.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('opium/vendors/nice-select/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('opium/vendors/animate-css/animate.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('opium/vendors/jquery-ui/jquery-ui.css')}}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ URL::asset('opium/css/style.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('opium/css/responsive.css')}}">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
			<div class="main_menu">
				@include('part.cust-nav')
			</div>
			<div class="logo_part">
				<div class="container">
					<a class="logo" href="#"><img src="{{ URL::asset('opium/img/logo.png ')}}" alt=""></a>
				</div>
			</div>
        </header>


        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
        	<div class="container">
				<div class="row">
					<div class="col-lg-5"></div>
					<div class="col-lg-4 offset-md-3">
						<div class="blog_text_slider owl-carousel">
							
							<div class="item">
								<div class="blog_text">
									<div class="cat">
										<a class="cat_btn" href="#">Learn</a>
									</div>
									<a href="#"><h4>Play, have Fun, have your assignment taken care of </h4></a>
									<p>Do you have a crush course, do you want to have all your assignments handled by Expert Tutors?</p>
									<a class="blog_btn" href="#">Signup Today</a>
								</div>
							</div>
							<div class="item">
								<div class="blog_text">
									<div class="cat">
										<a class="cat_btn" href="#">Have Fun and Play</a>
									</div>
									<a href="#"><h4>Let Your assignment done by experts</h4></a>
									<p>Post an assignment, have a guaranteed Distinction Grade. Money back guaranteed for dissatisfied customers.</p>
									<a class="blog_btn" href="#">Signup Today</a>
								</div>
							</div>
                            <div class="item">
                                <div class="blog_text">
                                    <div class="cat">
                                        <a class="cat_btn" href="#">Earn</a>
                                    </div>
                                    <a href="#"><h4>Using the Skills you learnt, Earn</h4></a>
                                    <p>Earn money from the soft skills ou have learnt. It is as easy as ABC.</p>
                                    <a class="blog_btn" href="#">Signup Today</a>
                                </div>
                            </div>
						</div>
					</div>
				</div>
        	</div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120">
            <div class="container">
                <div class="row">                  
                    <div class="col-lg-3">
                        <div class="blog_right_sidebar">
                            
                            <aside class="single_sidebar_widget author_widget">
                                <img class="author_img img-fluid" src="{{ URL::asset('opium/img/blog/author.png')}}" alt="">
                                <h4>Charlie Barber</h4>
                                <h5>5 Yrs of Tutoring</h5>
                                <p>I have been using this site for years. I enjoyed the workflow and the flexible payment period. </p>
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-github"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Popular Jobs</h3>
                                <div class="media post_item">
                                    <img src="{{ URL::asset('opium/img/blog/popular-post/post1.jpg')}}" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>Business and Applied Courses</h3></a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="{{ URL::asset('opium/img/blog/popular-post/post2.jpg')}}" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>Technology and Engineering</h3></a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="{{ URL::asset('opium/img/blog/popular-post/post3.jpg')}}" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>Astronomy Or Astrology</h3></a>
                                        <p>03 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="{{ URL::asset('opium/img/blog/popular-post/post4.jpg')}}" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3> History and Political Science</h3></a>
                                        <p>01 Hours ago</p>
                                    </div>
                                </div>
                                 <div class="media post_item">
                                    <img src="{{ URL::asset('opium/img/blog/popular-post/post4.jpg')}}" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3> Medicines and Nurse related Jobs </h3></a>
                                        <p>04 Hours ago</p>
                                    </div>
                                </div>

                                 <div class="media post_item">
                                    <img src="{{ URL::asset('opium/img/blog/popular-post/post4.jpg')}}" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3> Programming and Software Engineering</h3></a>
                                        <p>03 Hours ago</p>
                                    </div>
                                </div>

                                <div class="br"></div>
                            </aside>
                            <aside class="single-sidebar-widget newsletter_widget">
                                <h4 class="widget_title">Receive a newsletter</h4>
                                <div class="form-group d-flex flex-row">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                    </div>
                                    <a href="#" class="bbtns"><i class="lnr lnr-arrow-right"></i></a>
                                </div>	
                                <div class="br"></div>							
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title"> Catgories</h4>
                                <ul class="list cat-list">
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Technology</p>
                                            <p>37</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Engineering</p>
                                            <p>24</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>History</p>
                                            <p>59</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Art</p>
                                            <p>29</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Food Science</p>
                                            <p>15</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Architecture</p>
                                            <p>09</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Business</p>
                                            <p>44</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Accounting and Finance</p>
                                            <p>44</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Philosophy</p>
                                            <p>89</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Management </p>
                                            <p>26</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Social Sciences</p>
                                            <p>44</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Agricultire</p>
                                            <p>24</p>
                                        </a>
                                    </li>																				
                                </ul>
                            </aside>
                        </div>
                    </div>
                      <div class="col-lg-9">
                        <div class="blog_left_sidebar">
                            <article class="blog_style1">
                            	<div class="blog_img">
                            		<img class="img-fluid" src="{{ URL::asset('opium/img/home-blog/blog-1.jpg ')}}" alt="">
                            	</div>
                            	<div class="blog_text">
									<div class="blog_text_inner">
										<div class="cat">
											<a class="cat_btn" href="#">Gadgets</a>
											<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
											<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
										</div>
										<a href="#"><h4>Nest Protect: 2nd Gen Smoke + CO Alarm</h4></a>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<a class="blog_btn" href="#">Read More</a>
									</div>
								</div>
                            </article>
                            <div class="row">
                            	<div class="col-md-6">
                            		<article class="blog_style1 small">
										<div class="blog_img">
											<img class="img-fluid" src="{{ URL::asset('opium/img/home-blog/blog-small-1.jpg ')}}" alt="">
										</div>
										<div class="blog_text">
											<div class="blog_text_inner">
												<div class="cat">
													<a class="cat_btn" href="#">Gadgets</a>
													<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
													<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
												</div>
												<a href="single-blog.html"><h4>Nest Protect 2nd Gen Smoke CO Alarm</h4></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna aliqua.</p>
												<a class="blog_btn" href="#">Read More</a>
											</div>
										</div>
									</article>
                            	</div>
                            	<div class="col-md-6">
                            		<article class="blog_style1 small">
										<div class="blog_img">
											<img class="img-fluid" src="{{ URL::asset('opium/img/home-blog/blog-small-2.jpg ')}}" alt="">
										</div>
										<div class="blog_text">
											<div class="blog_text_inner">
												<div class="cat">
													<a class="cat_btn" href="#">Gadgets</a>
													<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
													<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
												</div>
												<a href="single-blog.html"><h4>Nest Protect 2nd Gen Smoke CO Alarm</h4></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna aliqua.</p>
												<a class="blog_btn" href="#">Read More</a>	
											</div>
										</div>
									</article>
                            	</div>
                            </div>
                            <article class="blog_style1">
                            	<div class="blog_img">
                            		<img class="img-fluid" src="{{ URL::asset('opium/img/home-blog/blog-2.jpg ')}}" alt="">
                            	</div>
                            	<div class="blog_text">
									<div class="blog_text_inner">
										<div class="cat">
											<a class="cat_btn" href="#">Gadgets</a>
											<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
											<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
										</div>
										<a href="single-blog.html"><h4>Nest Protect: 2nd Gen Smoke CO Alarm</h4></a>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<a class="blog_btn" href="#">Read More</a>
									</div>
								</div>
                            </article>
                            <div class="row">
                            	<div class="col-md-6">
                            		<article class="blog_style1 small">
										<div class="blog_img">
											<img class="img-fluid" src="{{ URL::asset('opium/img/home-blog/blog-small-3.jpg ')}}" alt="">
										</div>
										<div class="blog_text">
											<div class="blog_text_inner">
												<div class="cat">
													<a class="cat_btn" href="#">Gadgets</a>
													<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
													<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
												</div>
												<a href="single-blog.html"><h4>Nest Protect 2nd Gen Smoke CO Alarm</h4></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna aliqua.</p>
												<a class="blog_btn" href="#">Read More</a>
											</div>
										</div>
									</article>
                            	</div>
                            	<div class="col-md-6">
                            		<article class="blog_style1 small">
										<div class="blog_img">
											<img class="img-fluid" src="{{ URL::asset('opium/img/home-blog/blog-small-4.jpg ')}}" alt="">
										</div>
										<div class="blog_text">
											<div class="blog_text_inner">
												<div class="cat">
													<a class="cat_btn" href="#">Gadgets</a>
													<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
													<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
												</div>
												<a href="single-blog.html"><h4>Nest Protect 2nd Gen Smoke CO Alarm</h4></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna aliqua.</p>
												<a class="blog_btn" href="#">Read More</a>
											</div>
										</div>
									</article>
                            	</div>
                            </div>
                            <div class="row">
                            	<div class="col-md-6">
                            		<article class="blog_style1 small">
										<div class="blog_img">
											<img class="img-fluid" src="{{ URL::asset('opium/img/home-blog/blog-small-5.jpg ')}}" alt="">
										</div>
										<div class="blog_text">
											<div class="blog_text_inner">
												<div class="cat">
													<a class="cat_btn" href="#">Gadgets</a>
													<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
													<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
												</div>
												<a href="single-blog.html"><h4>Nest Protect 2nd Gen Smoke CO Alarm</h4></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna aliqua.</p>
												<a class="blog_btn" href="#">Read More</a>
											</div>
										</div>
									</article>
                            	</div>
                            	<div class="col-md-6">
                            		<article class="blog_style1 small">
										<div class="blog_img">
											<img class="img-fluid" src="{{ URL::asset('opium/img/home-blog/blog-small-6.jpg ')}}" alt="">
										</div>
										<div class="blog_text">
											<div class="blog_text_inner">
												<div class="cat">
													<a class="cat_btn" href="#">Gadgets</a>
													<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
													<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
												</div>
												<a href="single-blog.html"><h4>Nest Protect 2nd Gen Smoke CO Alarm</h4></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna aliqua.</p>
												<a class="blog_btn" href="#">Read More</a>
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
        <!--================Blog Area =================-->
        
        <!--================ start footer Area  =================-->	
        <footer class="footer-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Us</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Newsletter</h6>
                            <p>Stay updated with our latest trends</p>		
                            <div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                    <div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>		
                                    </div>									
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget instafeed">
                            <h6 class="footer_title">Instagram Feed</h6>
                            <ul class="list instafeed d-flex flex-wrap">
                                <li><img src="{{ URL::asset('opium/img/instagram/Image-01.jpg ')}}" alt=""></li>
                                <li><img src="{{ URL::asset('opium/img/instagram/Image-02.jpg ')}}" alt=""></li>
                                <li><img src="{{ URL::asset('opium/img/instagram/Image-03.jpg ')}}" alt=""></li>
                                <li><img src="{{ URL::asset('opium//instagram/Image-04.jpg ')}}" alt=""></li>
                                <li><img src="{{ URL::asset('opium/img/instagram/Image-05.jpg ')}}" alt=""></li>
                                <li><img src="{{ URL::asset('opium/img/instagram/Image-06.jpg')}}" alt=""></li>
                                <li><img src="{{ URL::asset('opium/img/instagram/Image-07.jpg ')}}" alt=""></li>
                                <li><img src="{{ URL::asset('opium/img/instagram/Image-08.jpg ')}}" alt=""></li>
                            </ul>
                        </div>
                    </div>	
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget f_social_wd">
                            <h6 class="footer_title">Follow Us</h6>
                            <p>Let us be social</p>
                            <div class="f_social">
                            	<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                        </div>
                    </div>						
                </div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | The Website has been Constructed <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://twitter.com/morgyken" target="_blank">@Mogyken</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
              <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ URL::asset('opium/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{ URL::asset('opium/js/popper.js')}}"></script>
        <script src="{{ URL::asset('opium/js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('opium/js/stellar.js ')}}"></script>
        <script src="{{ URL::asset('opium/vendors/lightbox/simpleLightbox.min.js')}}"></script>
        <script src="{{ URL::asset('opium/vendors/nice-select/js/jquery.nice-select.min.js ')}}"></script>
        <script src="{{ URL::asset('opium/vendors/isotope/imagesloaded.pkgd.min.js ')}}"></script>
        <script src="{{ URL::asset('opium/vendors/isotope/isotope-min.js ')}}"></script>
        <script src="{{ URL::asset('opium/vendors/owl-carousel/owl.carousel.min.js ')}}"></script>
        <script src="{{ URL::asset('opium/vendors/jquery-ui/jquery-ui.js ')}}"></script>
        <script src="{{ URL::asset('opium/js/jquery.ajaxchimp.min.js ')}}"></script>
        <script src="{{ URL::asset('opium/js/mail-script.js ')}}"></script>
        <script src="{{ URL::asset('opium/js/theme.js ')}}"></script>
    </body>
</html>