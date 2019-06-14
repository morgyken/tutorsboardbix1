<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="{{ URL::asset('opium/img/logo.png ')}}" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav">
								<li class="nav-item active"><a class="nav-link" href="{{route('home')}}">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="{{ URL::to('/') }}">Ask Questions</a></li>
								 
								<li class="nav-item"><a class="nav-link" href="contact.html">Contac t</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right header_social ml-auto">
								<li class="nav-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li class="nav-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li class="nav-item"><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
								<li class="nav-item"><a href="#"><i class="fa fa-google"></i></a></li>
								
                                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ Auth::user()->name }}</a>
                        </li>
                         <li class="nav-item">
                                     <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>

                            
                        @endguest
                    </ul>

						
						</div> 
					
				</nav>