<div class="modal fade bottom" id="frameModalBottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
            <div class="modal-dialog modal-frame modal-bottom col-xl-8" role="document">


              <div class="modal-content">
                <div class="modal-body">
                  <div class="modal-header ">
                        <h4 class="modal-title" id="exampleModalLongTitle"> All Bids</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>



                  <div class="row d-flex justify-content-center align-items-center">                  
                    <div class="col-xl-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">tutorId</th>
                                <th scope="col">Bid Points</th>
                                <th scope="col">Bid Prices </th>
                                <th scope="col">Award Bids </th>
                                </tr>
                                <?php 
                                $count =0;
                                ?>
                            </thead>
                            <tbody>
                           
                            @foreach($bids as $bid)
                                <tr>
                                <?php 
                                $count = $count+1;
                                ?>
                                <th scope="row"> {{$count }}</th>
                                <th scope="col"><img src="" /></th>
                                <td>{{ $bid->tutor_id }}</td>
                                <td>{{ $bid->bidpoints}} </td>
                                <td> {{ $bid->bid_price}}  </td>
                                <td> 
                                <form method='post' action="{{ route('assign-question',
                                ['question'=> $question->question_id,'biduser' => $bid->tutor_id])}}">
                                @csrf
                                    <input type='hidden' name= 'amount' value= {{$bid->bid_price}}> 
                                    <button type="submit" class="btn btn-warning">Award Bid</button>
                                </form> 
    
                                </td>
                                </tr>
                            @endforeach
                               
                            </tbody>
                            </table>  
                              
        
                    </div>
                      
                  </div>
                </div>
              </div>
            </div>
          </div>