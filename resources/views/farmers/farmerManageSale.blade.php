@extends('layout.farmer')

@section('modal')

    <!-- Edit Sale Modal -->
    <div class="modal fade" id="editSale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Sale Details</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- edit sale form -->
                <form class="form-horizontal" action="{{ route('farmer.editsale',$product->id) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <!-- Product Name -->
                        <!--do not! do not!-->
                        <div class="col-md-6">              
                            <label>Product</label>
                            <input type="hidden" name="productid" value="{{$product->id}}"><!--product id-->
                            <select class="form-control" id="productName" name="productName" placeholder="i.e. Sayote, Kamote" required>
                                <option disabled="true" selected>--Select Product--</option>
                                    @foreach($farmproducts as $fproduct)
                                        <option class="productitem" value="{{ $fproduct->id }}">{{$fproduct->productName}}</option> 
                                    @endforeach
                            </select>
                            <small class="text-muted">Choose the name of your product above.</small>
                        </div>
                        <!-- Product Variety -->
                        <div class="col-md-6" id="divvariety">
                            <label for="variety" id="divvariety">Class/Variety</label>
                            <select id="variety" class="form-control" name="variety" placeholder="i.e. California, Marble" >
                            </select>
                            <small class="text-muted">Choose a class/variety of the product</small>
                        </div>
                        <!--end of do not! do not!-->
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Price per Kg.</label>
                            <div class="input-group">
                                <span class="input-group-addon">Php</span>
                                <input type="number" name="price" value="{{$product->price}}" class="form-control" min="1">
                                <span class="input-group-addon">per Kilogram</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Quantity</label>
                            <div class="input-group">
                                <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control" min="1">
                                <span class="input-group-addon">Kilogram(s)</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Images</label>
                            <input type="file" class="form-control"  name="images[]"  multiple>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="{{ $errors->has('edate') ? ' has-error' : '' }}">
                                <label>End Date</label>
                                <small class="text-muted">End date of your sale.</small>
                                <div class='input-group date' id='endDate'>
                                    <input name="edate" type="text" value="{{$product->edate}}" class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                                @if ($errors->has('edate'))
                                <span class="help-block">
                                    <b>{{ $errors->first('edate') }}</b>
                                </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <input name="sdate" value="{{ $product->sdate}}" type="hidden"/>
                    <br>
                    <label>Trade instruction</label>
                    <textarea type="text" name="tradeInstruction" class="form-control" rows="5" placeholder="Lets meet @ Trading Post">{{$product->tradeInstruction}}</textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-success">Save changes</button>
                </div>
            </form>

            </div>
        </div>
    </div>

    <!-- Cancel Sale Modal -->
    <div class="modal fade" id="cancelSale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm text-center" role="document">
            <div class="modal-content">
            <form action="{{ route('farmer.cancelsale',$product->id) }}" method="POST">
            {{csrf_field()}}
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"> Cancel Sale?</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to cancel this sale? All bids will be cancelled</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger btn-lg">Yes, Cancel Sale</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" aria-label="Close">No</button>
                </div>
            </form>
            
            </div>
        </div>
    </div>

@endsection

@section('banner')

    <header class="masthead" style="background-image: url('{{ asset('images/homepage/farmerbanner.jpg') }}'); background-attachment:fixed; background-position:center; background-position:fixed;">
        <div class="container">
            <div class="banner">
            <div class="site-heading">

                <h1>{{ $product->productName }} <small class="text-warning">{{ $product->variety }}</small></h1>
                
            </div>
            </div>
        </div>
    </header>

@endsection

@section('body')

    <div class="row">
        <div class="col-md-4">

            @include('partials.flashmessage')

            <!-- Details -->
            <div class="caption222">
                
                <small>Overall Price of all products</small> 
                <?php $totalProfit = $product->price * $product->quantity; ?>
                <h2>&#x20B1 {{number_format($totalProfit)}}.00</h2>
                <hr> 

                <small>Preffered Price / Kg.</small><br>
                <h5>&#x20B1 {{$product->price}}.00 per Kg.</h5>
            
                <small>Remaining Products available</small><br>
                <h5>{{ $product->quantity }} Kg</h5>

                <small>Trade Instructions:</small><br>
                <h5>{{$product->tradeInstruction}}</h5>
            
                <small>Sale start:</small><br>
                <h5>{{ Carbon\Carbon::parse($product->sdate)->format('M j, Y') }}</h5>
                <input id="saleStartDate" hidden type="date" value="{{ $product->sdate }}"> <!-- IMPORTANT FOR TIMER. WAG GALAWIN -->

                <small>End of sale:</small><br>
                <h5>{{ Carbon\Carbon::parse($product->edate)->format('M j, Y') }}</b>
                <input id="saleEndDate" hidden type="date" value="{{ $product->edate }}"> <!-- IMPORTANT FOR TIMER. WAG GALAWIN -->

                <hr>

                <a href="" role="button" id="btnEditSale" class="btn btn-outline-success {{ count($acceptedBids)!=0 ? 'disabled':'' }}" data-toggle="modal" data-target="#editSale">
                    <i span class="fa fa-pencil"></i> Edit Sale
                </a>
                <a href="" role="button" id="btnCancelSale" class="btn btn-outline-success {{ count($acceptedBids)!=0 ? 'disabled':'' }}" data-toggle="modal" data-target="#cancelSale">
                    <i span class="fa fa-power-off"></i> Cancel Sale
                </a>

            </div>

            <br>

            <!-- Images -->
            <div id="images" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" style="height: 250px; background-color:rgba(0, 0, 0, 0.5);">

                    <?php $images=explode(',',$product->images); //create array of images ?>

                    <!-- First Image -->
                    <div class="carousel-item active">
                        <a href="{{ asset('images/Uploaded/') }}{{'/'.$images[0]}}" data-lightbox="gallery">
                            <img class="d-block w-100" src="{{ asset('images/Uploaded/') }}{{'/'.$images[0]}}">
                        </a>
                    </div>

                    <!-- Succeeding Images -->
                    @for($j=1; $j < count($images); $j++)
                    <div class="carousel-item">
                        <a href="{{ asset('images/Uploaded/') }}{{'/'.$images[$j]}}" data-lightbox="gallery">
                            <img class="d-block w-100" src="{{ asset('images/Uploaded/') }}{{'/'.$images[$j]}}">
                        </a>
                    </div>
                    @endfor

                </div>
                <a class="carousel-control-prev" href="#images" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#images" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="caption222">
                Click the image to view on full resolution.
            </div>

            <br>

        </div>
        <div class="col-md-8">

            <div class="caption222">
                <!-- Timer -->
                <div id="timer" class="text-warning" style="font-size:150%;">
                </div>
            </div>

            <!-- Nav -->
            <ul class="nav nav-tabs">
                <!--<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details">Sale</a></li>-->
                <li class="nav-item"><a class="nav-link active" data-toggle="tab"  href="#Bids">Bids</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab"  href="#accepted" id="accepttab">
                    <input hidden id="pid" value="{{$product->id}}">
                    Accepted Bids</a>
                </li>
            </ul>

            <!-- contents -->
            <div class="tab-content" id="tabcontent">

                <!-- Bids -->
                <div  class="tab-pane fade show active" id="Bids" role="tabpanel">

                    <!-- View Buyer Profile Modal -->
                    <div class="modal fade" id="viewBuyer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div id="buyerSecondDiv" class="modal-dialog modal-sm" role="document">
                            <div id="viewBuyerModalContent" class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel"> Buyer Info</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div id="buyerModalBody" class="modal-body" align="center">
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of View Buyer Profile Modal -->

                    <!--error msg here if null-->
                    @if( count($bids) != 0 )
                    <!-- Highest Bid -->
                    <!-- ===================  do not! do not! ==================================================================-->
                    
                    <div class="highestbid">

                        <div class="highest-bid-ribbon">
                            Highest Bid
                        </div>
                        <br>
                        <h5 class="text-center">
                            <a href="#" id="viewBidder" class="text-warning" data-toggle="modal" data-target="#viewBuyer">
                                <input id="getid" type="hidden" value="{{ $bids[0]->user_id }}">
                                Juan Dela Cruz
                            </a>
                            <small>{{ $bids[0]->created_at->diffForHumans() }}</small>
                        </h5>
                        <br>

                        <div class="row text-center">
                            <div class="col-md-4">
                                <small>Offered Price per Kg.</small><br>
                                <b>Php {{ $bids[0]->price }} per kg</b>
                            </div>
                            <div class="col-md-4">
                                <small>Quantity.</small><br>
                                <b> {{ $bids[0]->quantity }} kg</b>
                            </div>
                            <div class="col-md-4">
                                <small>Payment Option</small><br>
                                <b> {{ $bids[0]->paymentOption }}</b>
                            </div>
                        </div>
                        <hr>

                        <h6>
                        <a href="#Bids" id="acceptBidder" class="btn btn-success pull-right {{ $product->quantity < $bids[0]->quantity ? 'disabled': '' }}">
                            <input type="hidden" id="pid" value="{{$product->id}}"><!--product id-->
                            <input id="acceptBidderid" type="hidden" value="{{ $bids[0]->id }}">
                            Accept <i class="fa fa-check"></i>
                        </a>
                        <small>{{ $product->quantity -  $bids[0]->quantity}} kg will remain if accepted</small>
                        
                    </div>
                    <br>

                    <!-- end of Highest Bid -->

                    <!-- Other bidders -->
                    @for($x = 1; $x < count($bids); $x++)
                    <div class="otherbid">

                        <h6>
                        <b>
                            <span class="badge badge-warning" disabled>Bid #{{$x+1}}</span>
                            <a href="#" id="viewBidder" class="text-warning" data-toggle="modal" data-target="#viewBuyer">
                            <input id="getid" type="hidden" class="btn btn-success btn-sm" value="{{ $bids[$x]->user_id }}">
                            Juan Dela Cruz
                            </a>
                            <small>{{ $bids[$x]->created_at->diffForHumans() }}</small>
                        </b>
                        </h6>
                        <hr>

                         <div class="row text-center">
                            <div class="col-md-4">
                                <small>Offered Price per Kg.</small><br>
                                <h6>&#x20B1 {{$bids[$x]->price}} per kg</h6>
                            </div>
                            <div class="col-md-4">
                                <small>Quantity.</small><br>
                                <h6> {{$bids[$x]->quantity}} kg</h6>
                            </div>
                            <div class="col-md-4">
                                <small>Payment Option</small><br>
                                <h6> {{ $bids[0]->paymentOption }}</h6>
                            </div>
                        </div>
                        <br>
                        
                        <a href="#Bids" id="acceptBidder" class="btn btn-success btn-sm pull-right {{ $product->quantity < $bids[$x]->quantity ? 'disabled': ' ' }}">
                            <input type="hidden" id="pid" value="{{$product->id}}"><!--product id-->
                            <input id="acceptBidderid" type="hidden" value="{{ $bids[$x]->id }}">
                            Accept <i class="fa fa-check"></i>
                        </a>

                        <?php $totalQuantity = $product->quantity -  $bids[$x]->quantity ?>
                        <small>{{ $product->quantity -  $bids[$x]->quantity}} will remain if accepted</small><br>
                    </div>
                    <br>
                    @endfor
                    <!-- end of other Bid -->
                    <!-- =================== end of  do not! do not! ==================================================================-->
                    @else
                        @include('partials.noresult')
                    @endif

                </div>

                <!-- Accepted Bids -->
                <div role="tabpanel" class="tab-pane fade" id="accepted" role="tabpanel">

                    <!-- View Buyer Profile Modal -->
                    <div class="modal fade" id="viewBuyer1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div id="buyerSecondDiv" class="modal-dialog modal-sm" role="document">
                            <div id="viewBuyerModalContent" class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="myModalLabel">Buyer Info</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div id="buyerModalBody" class="modal-body" align="center">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /View Buyer Profile Modal -->

                    <input type="hidden" id="ifaccepted" value="{{ count($acceptedBids) }}"> <!--checks if the farmer already accepts-->
                    
                    @if( count($acceptedBids) != 0 )
                        @for($e = 0; $e < count($acceptedBids); $e++)
                        <div class="acceptedbid">
                            <b>
                            <a href="#" id="viewBidder" class="text-warning" data-toggle="modal" data-target="#viewBuyer1" style="color:white;">
                                <input id="getid" type="hidden" class="btn btn-success btn-sm" value="{{ $acceptedBids[$e]->user_id }}">
                                Juan Dela Cruz
                            </a>
                            <small>{{$acceptedBids[$e]->updated_at->diffForHumans()}} </small>
                            </b>

                            <hr>

                            <div class="row text-center">
                                <div class="col-md-4">
                                    <small>Price per Kg.</small><br>
                                    <b>Php {{ $acceptedBids[$e]->price }} / kg</b>
                                </div>
                                <div class="col-md-4">
                                    <small>Quantity.</small><br>
                                    <b> {{ $acceptedBids[$e]->quantity }} kg</b>
                                </div>
                                <div class="col-md-4">
                                    <small>Payment Option</small><br>
                                    <b>{{$acceptedBids[$e]->paymentOption}}</b>
                                </div>
                            </div>
                        </div>
                        <br>    
                        @endfor
                    @else
                        @include('partials.noresult')
                    @endif  

                </div>
            
            </div>

        </div>
    </div>

@endsection

@section('scripts')

    <!--PRODUCT to VARIETY/CLASS dependency-->
    @include('partials.varietydependency')


    <!-- VIEWING PROFILE -->
    <script type="text/javascript">
        $(document).ready(function(){ 
            //for profile
            $(document).on('click','#viewBidder',function(event){
                var child = $(this).find('#getid'); //finding the input filed inside <a> tag
                var bidderid = child.val(); //getting id
                //console.log('eto ung value = ' + bidderid);
                var parent = $(this).parent().parent().parent(); //get parent div
                var modal = parent.find('#viewBuyer');
                var modal1 = parent.find('#viewBuyerModalContent'); //dig until content div
                var content = " "; 
                $.ajax({type:'get',url:"{!!URL::to('getBidder')!!}", //goes to route(/getBidder)
                    data:{'id':bidderid}, //parameters passed on controller
                    success:function(bidder)
                    {
                        content =
                        '<p class="lead">'
                        + bidder.fname+' ' +bidder.middleinitial+'. '+bidder.lname  
                        +'</p><hr><input type="number" class="rating" id="buyerRatingB" value="4.5" disabled><label>Contact Number: <br></label><b>'
                        + bidder.contactno 
                        +'</b><br><label>Email Address: <br></label><b>'
                        + bidder.email +'</b>';
                        
                        modal1.find('#buyerModalBody').html(content);
                        modal1.find('#buyerRatingB').rating({step:.1, size:'xs', showClear:false, showCaption:false});
                    }
                });
            });
        });
    </script>

    <!-- ACCEPTING BIDS -->
    <script type="text/javascript">
        //for accepting bid
        $(document).ready(function(){

            // disabling of button if user accepted
             var userAccepted = $('#ifaccepted').val();
             if(userAccepted != 0){
                 $('#btnEditSale').attr("class",function(i,origValue){
                    return origValue += " disabled"; });
                $('#btnCancelSale').attr("class",function(i,origValue){
                    return origValue += " disabled"; });
                //refresh the button
                $("#modals").load("/farmer/manageSale/"+ pid+" #modals");//to reload the tab
             }

            $(document).on('click','#acceptBidder',function(event){
                var product = $(this).find('#pid');//id of the product
                var pid = product.val();
                var inputfield = $(this).find('#acceptBidderid'); //input field inside  A tag
                var bidid = inputfield.val(); //id of bid
                $.ajax({
                        type:'get',
                        url:"{!!URL::to('acceptBid')!!}",
                        data:{'id':bidid },//parameters passed on controller
                        success:function(data){
                            $("#tabcontent").load("/farmer/manageSale/"+ pid+" #tabcontent");//to reload the tab
                            //refresh the button
                            $("#modals").load("/farmer/manageSale/"+ pid+" #modals");//to reload the tab
                     } 
                });
                //$("#Bids").load("/farmer/manageSale/"+ pid+" #Bids");//to reload the tab
                $("#tabcontent").load("/farmer/manageSale/"+ pid+" #tabcontent");//to reload the tab
                $("#saledetail").load("/farmer/manageSale/"+ pid+" #saledetail");//to reload the details
                //DISABLE EDIT OR CANCEL IF ACCEPTED 
            });
               
         });
    </script>

    <!-- DATE TIME STYLE -->
    <script type="text/javascript">
        $(function () {
            $('#endDate').datetimepicker({
                useCurrent: false, //Important! See issue #1075
                format: "YYYY-MM-DD",
                minDate: moment()
            });
        });
    </script>

    <!-- COUNTDOWN TIMER -->
        <script src="{{ asset('js/countdown.min.js') }}"></script>
        <script>
            // Instanciating a new countdown with all defaults
            new Countdown();

            // Instanciating a custom countdown
            var countdown = new Countdown({
                selector: '#timer',
                msgBefore: "Welcome Buyers!",
                msgAfter: "Sale Ended!",
                msgPattern: "{days} days, {hours} hours and {minutes} minutes before this sale ends!",
                dateStart: new Date($('#saleStartDate').val()),
                dateEnd: new Date($('#saleEndDate').val())
            });
        </script>
    <!-- /END OF COUNTDOWN TIMER -->

@endsection