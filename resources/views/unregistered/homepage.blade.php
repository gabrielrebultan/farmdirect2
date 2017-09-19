@extends('layout.homepage')

@section('links')
    <li class="nav-item"><a class="nav-link" href="homepage#services">Services</a></li>
@endsection

@section('banner')
<div style="height:calc(100vh - 200px); width:100%; justify-content:center; flex-direction:column; display:flex;">
    <div class="container">
    <div class="row">
        <div class="col-md-6">

            <div style="margin:auto;padding:10px;">
                <h1 class="text-success">FarmDirect</h1>
                <p class="lead">A new opportunity for farmers and a place for all veggie / crop lovers.</p>
                <p>
                FarmDirect introduces the technology to farmers and buyers in the Philippines who use the traditional way of selling and buying farm products. FarmDirect enables farmers to post and set the price for their farm products, while enabling the buyers to bid on it. FarmDirect intends to contribute for the shortening of waiting time of the farmers to sell their farm products to the buyers. 
                </p>
                <br>
                <a role="button" class="btn btn-success btn-lg" href="/register">Register Now</a>
            </div>
            
        </div>
        <div class="col-md-6"></div>
    </div>
    </div>
</div>
@endsection

@section('body')

    <!-- Services -->
    <div class="jumbotron" id="services" style="background-color:none;">
        <div class="container text-center">

            <div class="row text-center">

                <div class="col-md-4">
                    <span class="fa fa-usd logo-small"></span>
                    <br><br>
                    <h1>Sell</h1>
                    <hr>
                    <p>Register as a farmer and sell your products to registered buyers.</p>
                </div>

                <div class="col-md-4">
                    <span class="fa fa-shopping-cart logo-small"></span>
                    <br><br>
                    <h1>Bid and Buy</h1>
                    <hr>
                    <p>Register as a buyer and browse various farm products offered by registered farmers. Find a bid you want then place your best bid.</p>
                </div>

                <div class="col-md-4">
                    <span class="fa fa-bullhorn logo-small"></span>
                    <br><br>
                    <h1>Look for..</h1>
                    <hr>
                    <p>Do a shoutout to farmers and let them know what you want.</p>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $('.parallax').parallax({imageSrc: '/public/images/2.jpg'});
    </script>

@endsection