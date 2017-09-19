@extends('layout.buyer')


@section('banner')
    <header class="masthead" style="background-image: url('{{ asset('images/homepage/farmerbanner.jpg') }}'); background-attachment:fixed; background-position:center; background-position:fixed;">
        <div class="container">
            <div class="banner">
            <div class="site-heading">
                <h1><i class="fa fa-bookmark"></i> MY BIDS</h1>
                <b>
                The following are your bids on various sales you've joined. Monitor all your bids here.
                You can visit the sale you bid on and edit it.
                </b>
            </div>
            </div>
        </div>
    </header>
@endsection

@section('body')

<div class="row">
    <div class="col-md-8">

    <!-- My Bids -->

    @if(count($myBids)!=0)
    @foreach($myBids as $bid)
    <div class="card">
        <div class="card-body">
            @if($bid->accepted != 1)
            <b class="text-info">Bid Pending <i class="fa fa-spinner fa-pulse fa-spin"></i></b>
            @else
            <b class="text-success">Bid Accepted <i class="fa fa-check"></i></button>
            @endif
        </div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-4">
                    <small>Offerred Price / Kg:</small><br>
                    <strong>{{ $bid->price }}</strong>
                    
                </div>
                <div class="col-md-4">
                    <small>Quantity:</small> <br>
                    <strong>{{ $bid->quantity }} kg.</strong> 
                    
                </div>
                <div class="col-md-4">
                    <small>Payment Option:</small> <br>
                    <strong>{{ $bid->paymentOption }}</strong> 
                    
                </div>
                
            </div>

            <hr>

            <small class="text-muted" disabled>bid was {{ $bid->created_at->diffForHumans() }}</small>
            <a href = "{{ route('buyer.viewsale',$bid->postedproduct_id) }}" class="btn btn-success btn-sm pull-right">Go to Sale <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
    <br>
    @endforeach
    @else
        You haven't placed a bid on a sale yet
    @endif
    </div>
    <div class="col"></div>
</div>    

@endsection