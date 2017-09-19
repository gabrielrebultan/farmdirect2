@extends('layout.buyer')

@section('styles')
    <style>
        .card-body{
            height: 120px;
        }
        .card-body h4{
            word-wrap: break-word;
        }
    </style>
@endsection

@section('banner')
    <header class="masthead" style="background-image: url('{{ asset('images/homepage/farmerbanner.jpg') }}'); background-attachment:fixed; background-position:center; background-position:fixed;">
        <div class="container">
            <div class="banner">
            <div class="site-heading">

                <h1><i class="fa fa-shopping-cart"></i> SALES</h1>
                <b> Browse through ongoing sales of our farmers now! </b>
            
            </div>
            </div>
        </div>
    </header>
@endsection

@section('body')
 
    <div class="row">
        <div class="col"></div>
        <!--Search-->
        <div class="col-md-4">
            <form  action="{{ route('buyer.search/filter') }}" method="POST">
            {{csrf_field()}}
                <div class="input-group">
                    <input type="text" id="searchProduct" name="productName" class="form-control" placeholder="Search Sale...">
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>

        <!--Filter-->
        <div class="col-md-4">

            <form action="{{ route('buyer.search/filter') }}" method="POST" >
            {{csrf_field()}}
                <div class="input-group">
                    <select name="productName" class="form-control">
                        <option disabled selected="true" >Select Product..</option>
                        @foreach($filterItems as $item)
                            <option value="{{$item->productName}}" >{{$item->productName}}</option>
                        @endforeach
                    </select>
                    <div class="input-group-btn">
                        <input type="submit" class="btn btn-success pull-right" value="Filter">
                    </div>
                </div>
            </form>
            
        </div>

        <div class="col"></div>
    </div>

    <br>
   
    @include('partials.flashmessage')   <!--//flash message-->

    <!-- Sales -->
    <section id="pinBoot">

        @foreach($sales as $sale)
        <article class="white-panel">

        
            <?php $firstimg=explode(',',$sale->images); //create array of images?>

            <!--displayed the first image in the array-->
            <a href="{{'/buyer/view-sale/'.$sale->id }}">
                <img src="images/Uploaded/{{$firstimg[0]}}" alt="Image not found" class="card-img-top">
            </a>
            <br><br>

            <h5 class="text-success">{{$sale->productName}} <small class="text-warning">{{$sale->variety}}</small></h5>
            
            <b>PhP {{$sale->price}} / Kg </b> |

            <b>{{$sale->quantity}} KG remaining</b>
            <hr>
                    
            <a href="{{'/buyer/view-sale/'.$sale->id }}" class="btn btn-outline-success btn-sm">View Sale</a>
            
        </article>
        @endforeach

    </section>
    <!-- /.Sales -->

@endsection

@section('searchscripts')
    @include('partials.searchAutocomplete');
@endsection

@section('scripts')
    
@endsection

