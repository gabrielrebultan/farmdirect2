@extends('layout.buyer')

@section('modal')

    <!-- Bid Modal -->
    <div class="modal fade" id="Bid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b class="modal-title" id="myModalLabel">Place a Bid</b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form-horizontal" action="/buyer/view-sale/{{$product->id}}" method="POST">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <input type="hidden" name="postedproductid" class="form-control" value="{{$product->id}}" >
                        <label>Price per Kilo</label>

                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Php</span>
                            <input type="number" name="price" class="form-control" aria-describedby="basic-addon1" required min=0 >
                            <span class="input-group-addon" id="basic-addon1">per Kilogram</span>
                        </div>
                        <small class="text-muted">Place your price per kilo for the farmer's product.</small>

                        <hr>

                        <label>Quantity</label>
                        <div class="input-group">
                            <input type="number" name="quantity" class="form-control" aria-describedby="basic-addon2" required min=0 max="{{ $product->quantity }}">
                            <span class="input-group-addon" id="basic-addon22">Kilogram</span>
                        </div>
                        <small class="text-muted">Place how many you want to get in the farmer's products</small>
                        <hr>

                        <label>Payment Option</label>
                        <select name="paymentoption" class="form-control" required>
                            <option>Cash on Transaction</option>   
                            <option>Credit</option>
                        </select>
                        <small class="text-muted">Place how you want to pay this farmer.</small>


                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="placeBid" class="btn btn-success" value="Submit Bid" style="width:100%;">
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Farmer Details Modal -->
    <div class="modal fade" id="viewFarmer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div id="farmerSecondDiv" class="modal-dialog modal-sm" role="document">
            <div id="viewFarmerModalContent" class="modal-content">
                <div class="modal-header">
                    <b class="modal-title" id="myModalLabel">Farmer Details</b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="farmerModalBody" class="modal-body text-center">
                    <h3 class="text-success">{{$owner->fname.' '.$owner->middleinitial.'. '.$owner->lname}}</h3>
                    <input type="number" id="rateofbuyer" class="rating" data-size="xs" disabled value="2.5" step=".1">
                    <b>{{$owner->contactno}}</b><br>
                    <b>{{$owner->email}}</b>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('banner')
<header class="masthead" style="background-image: url('{{ asset('images/homepage/farmerbanner.jpg') }}'); background-attachment:fixed; background-position:center; background-position:fixed;">
    <div class="container">
        <div class="site-heading">
            <h1 style="font-size:300%;">{{ $product->productName }} <small class="text-warning">{{ $product->variety }}</small></h1>

            <b class="text text-warning"> 
                Sale by 
                <a href="#" data-toggle="modal" data-target="#viewFarmer">
                    {{$owner->fname.' '.$owner->middleinitial.'. '.$owner->lname}}
                </a>
            </b>

        </div>
    </div>
</header>
@endsection

@section('body')

    <div class="row">
    <div class="col-md-4">

        @include('partials.flashmessage')

        <div class="captionwhite">

            <small>Overall Price of products</small> 
            <?php $totalProfit = $product->price * $product->quantity; ?>
            <h2>&#x20B1 {{number_format($totalProfit)}}.00</h2>
            <hr>

            <small>Farmer's Price per Kg.</small>
            <h5>&#x20B1 {{$product->price}}.00 </h5>

            <small>Remaining Products</small>
            <h5>{{$product->quantity}} kg. left</h5>

            <small>Trade Instructions</small><br>
            <h5>{{$product->tradeInstruction}}</h5>

            <small>Start Date:</small><br>
            <h5>{{ Carbon\Carbon::parse($product->sdate)->format('M j, Y') }}</h5>
            <input id="saleStartDate" hidden type="date" value="{{ $product->sdate }}"> <!-- IMPORTANT FOR TIMER. WAG GALAWIN -->
        
            <small>End Date</small><br>
            <h5>{{ Carbon\Carbon::parse($product->edate)->format('M j, Y') }}</h5>
            <input id="saleEndDate" hidden type="date" value="{{ $product->edate }}"> <!-- IMPORTANT FOR TIMER. WAG GALAWIN -->
        
            <br>

            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#Bid" style="width:100%;">
                Place a bid
            </button>

        </div>

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
        <div class="captionwhite">
            Click the image to view on full resolution.
        </div>


    </div>
    <div class="col-md-8">

        <div class="captionwhite">
            <!-- Timer -->
            <div id="timer" class=" text-warning" style="font-size:150%;">
            </div>
        </div>
        <br>

        <!-- Nav -->
        <ul class="nav nav-tabs">
            
            <li class="nav-item">
                <a class="nav-link active" href="#bids" role="tab" data-toggle="tab" title="Bids of other buyers for this product.">
                    Other Bids
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mybid" role="tab" data-toggle="tab"  title="This is your bid. You cannot edit this once your bid is accepted.">
                    My Bid
                </a>
            </li>
        </ul>

        <!-- Tab contents -->
        <div class="tab-content">

            <!-- Bids -->
            <div role="tabpanel" class="tab-pane fade show active" id="bids" role="tabpanel">

                @if( count($bids) != 0 )
                    <!-- Highest Offer -->
                    <div class="highestbid">
                        <div class="highest-bid-ribbon">
                            Highest Bid
                        </div>
                        <br>
                        <div class="row text-center">
                            
                            <div class="col-md-4">
                                <small>Offered Price per Kg.</small><br>
                                <b>&#x20B1 {{ $bids[0]->price }} per kg</b>
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
                    </div>
                    <!-- end of Highest Offer -->
                    <br>
                    <!-- Other bidders  -->
                    @for($x = 1; $x < count($bids); $x++)
                    <div class="otherbid">
                        <button class="btn btn-outline-success btn-sm pull-right" disabled>#{{$x+1}}</button>
                        <div class="row text-center">
                            <div class="col-md-4">
                                <small>Offered Price per Kg.</small><br>
                                <b>&#x20B1 {{$bids[$x]->price}} per kg</b>
                            </div>
                            <div class="col-md-4">
                                <small>Quantity.</small><br>
                                <b> {{$bids[$x]->quantity}} kg</b>
                            </div>
                            <div class="col-md-4">
                                <small>Payment Option</small><br>
                                <b> {{ $bids[0]->paymentOption }}</b>
                            </div>
                        </div>
                    </div>
                    <br>
                    @endfor
                    <!-- end of other Bidders -->
                @else
                    <p>There are no bids to display</p>
                @endif
                

            </div>
            
            <!-- My Bid -->
            <div role="tabpanel" class="tab-pane fade in" id="mybid" role="tabpanel">

                @if(count($myBid)!=0)
                <form class="form-horizontal" action="" method="POST">
                    {{csrf_field()}}

                    @if($myBid[0]->accepted != 1 )
                    <small class="text-info"><i class="fa fa-spinner fa-pulse fa-spin"></i> Bid is still Pending. You can still edit your bid</small>
                    @else
                    <small class="text-success"><i class="fa fa-check"></i>  Bid Accepted</small>
                    @endif

                    <br><br>
                        
                    <div class="row">
                        <div class="col-md-4">

                            <label>Price per Kilo</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">PhP</span>
                                <input type="number" name="bidPrice" class="form-control" aria-describedby="basic-addon1" value="{{ $myBid[0]->price }}" {{ $myBid[0]->accepted == 1 ? 'disabled':'' }}>
                            </div>
                            <br>

                        </div>
                        <div class="col-md-4">

                            <label>Quantity</label>
                            <div class="input-group">
                                <input type="number" id="bidQuantity" name="bidQuantity" class="form-control" aria-describedby="basic-addon2" value="{{ $myBid[0]->quantity }}"{{ $myBid[0]->accepted == 1 ? 'disabled':'' }} >
                                <input type="hidden" id="bidId" name="bidId" class="form-control" value="{{ $myBid[0]->id }}" >
                                <input type="hidden" name="bidProductid" class="form-control" value="{{ $myBid[0]->postedproduct_id }}" >
                                <span class="input-group-addon" id="basic-addon2">Kilograms</span>
                            </div>
                            <br>

                        </div>
                        <div class="col-md-4">
                        
                            <label>Payment Option</label>
                            <div class="input-group">
                                <select name="bidpaymentoption" class="form-control" required {{ $myBid[0]->accepted == 1 ? 'disabled':'' }}>
                                    <option disabled>{{ $myBid[0]->paymentOption }}</option>   
                                    <option>Cash on Transaction</option>   
                                    <option>Credit</option>
                                </select>
                            </div>

                            </div>

                    </div>

                    <hr>

                    <input  type="submit" name="editBid" class="btn btn-outline-success btn-sm" value ="Save Changes"  {{ $myBid[0]->accepted == 1 ? 'disabled':'' }} >
                    <a href="{{ route('buyer.cancelbid',$myBid[0]->id) }}" name="cancelBid" class="btn btn-outline-warning btn-sm {{ $myBid[0]->accepted == 1 ? 'disabled':'' }}"  >Cancel Bid </a>

                </form>
                @else
                    <p>You have not yet placed a bid in this sale</p>
                @endif

            </div>

        </div>

    </div>
    <div class="col"></div>
    </div>

@endsection


@section('scripts')

    <script>
        //for tooltips
        $(function () {
            $('[data-toggle="tab tooltip"]').tooltip()
        })
    </script>

    <script src="{{ asset('js/star-rating.js') }}"></script>
    <script>
        $("#rateofbuyer").rating({size:'xs', showClear:false, showCaption:false});
    </script>

    <script type="text/javascript">
    $(document).ready(function(){        
        var bidid = $('#bidId').val();  //get the id of bid when true
        console.log(bidid);
        if(bidid != undefined){
            $('#bidbtn').attr("data-target",function(i,origValue){  //cahnge the attrib
                return origValue = "";
            });
            $('#bidbtn').attr("class",function(i,origValue){  //cahnge the attrib
                return origValue += " disabled";
            });
        }
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
    <!-- END OF COUNTDOWN TIMER -->

@endsection
