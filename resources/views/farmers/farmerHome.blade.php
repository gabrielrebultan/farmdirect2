@extends('layout.farmer')

@section('banner')

    <header class="masthead" style="background-image: url('{{ asset('images/homepage/farmerbanner.jpg') }}'); background-attachment:fixed; background-position:center; background-position:fixed;">
        <div class="container">
            <div class="banner">
            <div class="site-heading">
                <h1><i class="fa fa-dollar"></i> MY SALES</h1>
                <strong>The following are the sales you've started</strong>
            </div>
            </div>
        </div>
    </header>

@endsection

@section('body')


    @if(!$sales)   
    <!--possible partials-->
    <div class="row">
        <div class="col-sm-6">
            <h4 style="text-align:center" class="alert alert-warning">
                <span class="fa fa-exclamation-sign"></span>&nbsp{{$errormsg}}
            </h4>
        </div>
    </div>
    @endif

    @include ('partials.flashmessage')


    <!-- Sales -->
    <section id="pinBoot">

        @foreach($sales as $sale)
        <article class="white-panel">

            <?php $firstimg = explode(',',$sale->images); //create array of images ?>
            <!--displayed the first image in the array-->
            <img src="images/Uploaded/{{$firstimg[0]}}" alt="Image not found" class="card-img-top">
            <br><br>

            <h1>
                <a href="/farmer/manageSale/{{$sale->id}}">{{$sale->productName}}</a> 
                <small class="text-warning">{{$sale->variety}}</small>
            </h1>

            <small>Status:</small>
            <strong>Ongoing / Finished</strong><br>

            <span class="badge badge-warning">{{count($sale->bid)}} Bids</span>
            
            <hr>

            <a href="/farmer/manageSale/{{$sale->id}}" class="btn btn-outline-success btn-sm">Manage</a>

        </article>
        @endforeach
    
    </section>
    <!-- /.Sales -->
       

@endsection