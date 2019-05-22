

@extends('layouts.layout-home')

@section ('content')


</style>
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120 single-post-area">
            <div class="container">
                <div class="row">             
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main_blog_details">
                                    <div class="logo_part">
                                        <div class="container">
                                            <a class="logo" href="#"><img src="{{ URL::asset('opium/img/logo.png')}}" alt=""></a>
                                        </div>
                                    </div>
                            <hr>
              

                     
                             <h3 class="thin text-center">Upload profile piture Here </h3>
                          

                            <form class="form-horizontal" method="POST" action="{{ route('profile-pic', ['pic' => 'profile']) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                               @include('part.file-picker')

                               <input type="hidden" name="pic" value="main-profile"/>


                               <div style="min-height: 25px"></div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md">
                                        <button type="submit" class="btn btn-primary">
                                            Upload
                                        </button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
        </section>

    
 
        
        @endsection


