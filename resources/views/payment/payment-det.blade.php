@extends('layouts.layout-cust')

@section ('content')



    <div class="clearfix">
        <div class="col-md-10">
            <h4>Question Detail  </h4>
        </div>
        <div class="col-md-2">
            <h4> Other Details</h4>
        </div>

    </div>
<hr>


</script>
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120">
            <div class="container">
                <div class="row">   
                <hr class="type_1">  

                    @include('part.cust-nav-left')

                      <div class="col-lg-9">
                        <div class="blog_left_sidebar">
                            <article class="blog_style1"; style="text-align: center; ">
                                
                                <a class="logo" href="#"><img src="{{ URL::asset('opium/img/logo.png ')}}" alt=""></a>
                            </article>                            
                          
                            <article class="blog_style1";">
                                
                                <div class="blog_text">                           

                                <div class="card">
                                <div class="card-body col-md-10" style="padding:20px; align: center">                                  
                                    
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <address>
                                                           <h2> <strong>TutorsBoardbiz Smart LTD</strong> </h2>
                                                            <br>
                                                            2135 Sunset Blvd
                                                            <br>
                                                            Los Angeles, CA 90026
                                                            <br>
                                                            <abbr title="Phone">Phone Contact:</abbr> (213) 484-6829
                                                        </address>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                                        <p>
                                                            <em>Date:  {{Session::get('receiptDate') }}</em>
                                                        </p>
                                                        <p>
                                                            <em>Receipt #: {{Session::get('receiptNo') }}</em>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="text-center">
                                                        <h2>Receipt</h1=2>
                                                    </div>
                                                    </span>
                                                    <table class="table table-hover" style="margin-left:20px">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>#</th>
                                                                <th class="text-center">Price</th>
                                                                <th class="text-center">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="col-md-9"><em>Cost for Order</em></h4></td>
                                                                <td class="col-md-1" style="text-align: center"> 1 </td>
                                                                <td class="col-md-1 text-center"> {{ Session::get('question_price')}}</td>
                                                                <td class="col-md-1 text-center">{{ Session::get('question_price')}}</td>


                                                            </tr>
                                                            <?php
                                                                    $tax1 = number_format((4/100) * Session::get('price12'),2);
                                                                    $tax2 = number_format((3/100) * Session::get('price12'),2)
                                                                ?>
                                                            <tr>
                                                                <td class="col-md-9"><em>Taxes (3%)</em></h4></td>
                                                                <td class="col-md-1" style="text-align: center"> 2 </td>
                                                                <td class="col-md-1 text-center">${{ $tax1}} </td>
                                                                <td class="col-md-1 text-center">${{  $tax1 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-md-9"><em>Transaction Charges (4%) </em></h4></td>
                                                                <td class="col-md-1" style="text-align: center"> 3 </td>

                                                                <td class="col-md-1 text-center">${{$tax2 }}</td>
                                                                <td class="col-md-1 text-center">${{ $tax2 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>   </td>
                                                                <td>   </td>
                                                                <td class="text-right">
                                                                <p>
                                                                    <strong>Subtotal: </strong>
                                                                </p>
                                                                <?php
                                                                
                                                                $taxes = (3/100) * Session::get('price12') + (4/100) * Session::get('price12')
                                                                ?>
                                                                <p>
                                                                    <strong>Tax: </strong>
                                                                </p></td>
                                                                <td class="text-center">
                                                                <p>
                                                                    <strong>{{ $taxes}}</strong>
                                                                </p>
                                                                <p>
                                                                    <strong> {{$taxes }}</strong>
                                                                </p></td>
                                                            </tr>
                                                            <tr>
                                                                 <?php
                                                                $total =Session::get('price12') +  (3/100) * Session::get('price12') + (4/100) * Session::get('price12');

                                                                ?>
                                                                <td>   </td>
                                                                <td>   </td>
                                                                <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                                                <td class="text-center text-danger"><h4><strong>{{ $total  }}</strong></h4></td>
                                                            </tr>
                                                        <?php
                                                        $amount = Session::get('price12');

                                                        ?>    


                                                        </tbody>
                                                    </table>
                                                    <form method="get" action="{{route('get.paypal', [ 'total' => $total]) }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                        <button type="submit" class="btn btn-success btn-lg btn-block">
                                                        Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                                                    </button>
                                                    </form>
                                                    </td>
                                                </div>
                                            </div> 
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
        
        @endsection 



  
