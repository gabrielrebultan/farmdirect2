@extends('layout.homepage')

@section('styles')

    <style>
        /* NEEDED FOR CONTROLLING IMAGES */
        .controlImg{
            position:relative;
            overflow:hidden;
            height:120px;
        }
            
        .controlImg img{
            transition:all ease-in 500ms;
            border:1px solid #fff;
            background-position:center;
        }
        .controlImg img:hover{
            transform:scale(1.3,1.3);
            cursor:pointer;
        }	
        .product {
            margin-top:20px;
        }

        .card-body {
            height: 150px;
            background-color:white;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card-body h4{
            word-wrap: break-word;
        }
    </style>

@endsection

@section('banner')
    <div class="text-center">
        <h1>Sales</h1>
        <p>Register now or Login to be able to bid on these sales</p>
    </div>
@endsection

@section('body')

    <div class="container">

        <div class="row">
            <div class="col"></div>
            <div class="col-md-4">
                <form action="{{ route('unregistered.searchfilter') }}" method="POST">
                    {{csrf_field()}}
                    <div class="input-group input-group-sm">
                        <input type="text" id="searchProduct" name="productName" class="form-control" placeholder="Search Sale...">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <form class="form-horizontal" action="{{ route('unregistered.searchfilter') }}" method="POST" >
                    {{csrf_field()}}
                    <div class="input-group input-group-sm">
                        <select name="productName" class="form-control">
                            <option disabled selected="true">Select Product...</option>
                            @foreach($fproducts as $fp)
                                <option class="productitem" >{{$fp->productName}}</option> 
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

        @include('partials.flashmessage')

        <!-- Ongoing sales -->

        <section id="pinBoot">
            @if(count($sales) != 0)   
            @foreach($sales as $sale)
            <article class="white-panel">

                <?php $firstimg = explode(',',$sale->images); //create array of images ?>
                 
                <!--displayed the first image in the array-->
                <a href="/view-product/{{$sale->id}}">
                    <img src="images/Uploaded/{{$firstimg[0]}}" alt="Image not found" class="card-img-top">
                </a>
                <br><br>

                <h5 class="text-success">{{$sale->productName}} <small class="text-warning">{{$sale->variety}}</small></h5>
            
                <b>PhP {{$sale->price}} / Kg </b> |

                <b>{{$sale->quantity}} KG remaining</b>
                <hr>
                
                <button class="btn btn-outline-info btn-sm" disabled>Bids: {{ count($sale->bid) }}</button>
                <a href="/view-product/{{$sale->id}}" class="btn btn-outline-success btn-sm">View</a>
            

            </article>
            @endforeach
            @else
                <p>There are no sales yet</p>
            @endif
        </section>
        
    </div>
@endsection

<!--search intelisense-->
@section('searchscript')
    
        @include('partials.searchAutocomplete');
   
@endsection

@section('scripts')

@endsection