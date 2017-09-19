@extends('layout.homepage')

@section('banner')
    <div class="text-center">
        <h1>{{$sale->productName}}</h1>
        <a href="/sales" class="btn btn-secondary">Back to sales</a>
    </div>
@endsection

@section('body')

    <div class="container">
        
        <!-- Nav tabs -->
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item"><a class="nav-link active" href="#details" role="tab" data-toggle="tab">Sale Details</a></li>
            <li class="nav-item"><a class="nav-link" href="#offers" role="tab" data-toggle="tab">Offers</a></li>
        </ul>

        <br>

        <!-- Tab contents -->
        <div class="tab-content">

            <div class="tab-pane fade show active" id="details" role="tabpanel">

                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-8">
                        <!-- Sale Details -->

                        <label>Sale Details</label>
                        <div class="card">
                            <div class="card-body">

                                <div class="row text-center">
                                <div class="col-md-4">

                                    <label>Overall Price</label>
                                    <h3>PhP {{$sale->price * $sale->quantity}}.00</h3>
                                    <hr>

                                </div>
                                <div class="col-md-4">

                                    <label>Preffered Price / Kg.</label>
                                    <h3>Php {{$sale->price}} / Kg.</h3>
                                    <hr>

                                </div>
                                <div class="col-md-4">

                                    <label>Remaining Products</label>
                                    <h3>{{$sale->quantity}} kg</h3>
                                    <hr>

                                </div>
                                </div>

                                <div class="row text-center">
                                <div class="col-md-6">

                                    <label>Trade Instructions</label><br>
                                    <strong class="text-warning">{{$sale->tradeInstruction}}</strong>

                                </div>
                                <div class="col-md-3">

                                    <label>Start Date:</label><br>
                                    <strong> {{ Carbon\Carbon::parse($sale->sdate)->format('M. j, Y') }}</strong>
                                    
                                </div>
                                <div class="col-md-3">

                                    <label>End Date</label><br>
                                    <strong> {{ Carbon\Carbon::parse($sale->edate)->format('M. j, Y') }}</strong>

                                </div>
                                </div>


                            </div>
                            <div class="card-footer">

                                <strong>Farmer Details</strong>

                                <div class="row">
                                <div class="col-md-6">

                                    <small>Name</small><br>
                                    <h3>{{ $farmer[0]->fname.' '.$farmer[0]->lname }}</h4>

                                </div>
                                <div class="col-md-6">

                                    <small>Rating</small><br>
                                    <input id="rateoffarmer" name="input-name" type="number" class="rating" step=".1" value="4.6" data-size="xs" disabled>

                                </div>
                                </div>

                            </div>
                        </div>
                    
                        <hr>

                        <!-- Images -->
                        <label>Images. <small>CLick on the image to view on full pic</small></label>
                        <div class="row">
                            <?php $images = explode(',',$sale->images); ?>
                            @foreach($images as $i)
                                <div class="col-4">
                                    <div class="controlImg">
                                        <a href="{!! asset("images/Uploaded/$i") !!}" data-lightbox="gallery">
                                            <img src="{!! asset("images/Uploaded/$i") !!}" alt="Image not found">
                                        </a><!--images/Uploaded/{{ $i }}-->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

            </div>

            <!-- Offers -->
            <div class="tab-pane fade in" id="offers" role="tabpanel">
            @if( count($bids) != 0 )
                <!-- Highest Offer -->
                <div class="card">
                    <div class="card-body text-center">
                        <button class="btn btn-success btn-sm" disabled>TOP BID</button>
                        <small class="text text-muted pull-right">{{ $bids[0]->created_at->diffForHumans() }}</small>
                        <br><br>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Offered Price per Kg.</label>
                                <h6>Php {{ $bids[0]->price }} / kg</h6>
                                <hr>
                            </div>
                            <div class="col-md-3">
                                <label>Quantity.</label>
                                <h6> {{ $bids[0]->quantity }} kg</h6>
                                <hr>
                            </div>
                            <div class="col-md-3">
                                <label>Preffered Payment Option</label>
                                <h6>{{ $bids[0]->paymentOption }}</h6>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <!-- Other bidders -->
                <!-- Other bidders -->
                @for($x = 1; $x < count($bids); $x++)
                <div class="card">
                    <div class="card-body text-center">
                        <small class="text text-muted pull-right">{{ $bids[$x]->created_at->diffForHumans() }}</small>
                        <br><br>
                        <div class="row text-center">
                            <div class="col-md-3">
                                <small>Offered Price per Kg.</small><br>
                                <h6>Php {{$bids[$x]->price}} per kg</h6>
                                <hr>
                            </div>
                            <div class="col-md-3">
                                <small>Quantity.</small><br>
                                <h6> {{$bids[$x]->quantity}} kg</h6>
                                <hr>
                            </div>
                            <div class="col-md-3">
                                <small>Preffered Payment Option</small><br>
                                <h6>{{ $bids[$x]->paymentOption }}</h6>
                                <hr>
                            </div>
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

@endsection

@section('scripts')

    <!-- RATING STYLES -->
        <script>
            $("#rateoffarmer").rating({showClear:false, showCaption:false});
        </script>
    <!-- END OF RATING STYLES -->

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