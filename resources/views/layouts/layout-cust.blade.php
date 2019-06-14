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
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <!--UiKit Css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.xx.x/css/uikit.min.css" />
        <!--End Uikit -->
        <!-- main css -->
        <link rel="stylesheet" href="{{ URL::asset('opium/css/style.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/theme1e.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('opium/css/responsive.css')}}">
            <!-- Include Editor style. -->
        <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
        <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_style.min.css' rel='stylesheet' type='text/css' />     


    </head>
    <style type="text/css">
                
        .blog_style1 .blog_text{
            
        padding-left: 40px;
        padding-right: 40px;
        padding-top: 0px;
        padding-bottom: 0px;

        }
        .header_area + section, .header_area + div
        {
            margin-top:20px;
        }
        .blog_style1 .blog_text .blog_text_inner{
            margin-top: 0px;
        }

        hr.type_1 {
        border: 0;
        height: 55px;
        background-image: url(image/type_1.png);
        background-repeat: no-repeat;
        }
        .btn-file {
          position: relative;
          overflow: hidden;
        }
        .btn-file input[type=file] {
          position: absolute;
          top: 0;
          right: 0;
          min-width: 100%;
          min-height: 100%;
          font-size: 100px;
          text-align: right;
          filter: alpha(opacity=0);
          opacity: 0;
          background: red;
          cursor: inherit;
          display: block;
        }
        input[readonly] {
          background-color: white !important;
          cursor: text !important;
        }
    </style>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
			<div class="main_menu">
				@include('part.nav-cust')
			</div>
			
        </header>
  <!--================ End of Header Area =================-->
  <!--================ Body Area  =================-->

      @yield('content')

        <footer class="footer-area">
            <div class="container">
                
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | The Website has been Constructed <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://twitter.com/morgyken" target="_blank">@Morgyken</a>
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
        <script src="{{ URL::asset('uikit/uikit.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>
          <!-- Autocomplete Javascript -->
        <script src="{{ URL::asset('uikit/components/autocomplete.js')}}"></script>    

        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.xx.x/js/uikit.min.js"></script>
        <!-- Include JS file. -->
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.min.js'></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    
    </body>
</html>