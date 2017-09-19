@extends('layout.farmer')

@section('body')

<div class="row" style="margin-top:100px;" >
    <!-- Looking to buy form -->
    <div class="col-md-6">

        <form action="" method="POST">
            {{csrf_field()}}

            <div class="banner">
                <h3>{{ $lookingfor->user['fname'].' '.$lookingfor->user['lname'] }}</h3>
                <p class="lead">is looking to buy the following products</p>
                <a href="/farmer/looking-for" class="btn btn-outline-success"><i class="fa fa-chevron-left"></i> Back to list</a>
            </div>

            <div class="caption222">
                <i>{{ $lookingfor->detail }}</i>
            </div>

        </form>
        <br>

    </div>
    <div class="col-md-6">

        <div class="bg-white" style="margin-bottom:20px;">
            <?php 
            $prods = explode(',',$lookingfor->productName); //making it an array
            $variety = explode(',',$lookingfor->variety);
            ?>

            @for( $x = 0; $x < count($prods) ; $x++) 
            <h1>{{ $prods[$x] }}: <small class="text-success">{{ $variety[$x] }}</small></h1>
            <hr>
            @endfor

            <small>End of list</small>

        </div>

        <div class="caption222">

            <textarea type="text" class="form-control" placeholder="add a public comment" rows="2"></textarea>
            <br>
            <button type="submit" class="btn btn-outline-secondary btn-sm">Comment</button>

            <hr>

            <label>Comments</label>
            <br>

            <!-- Sample Comment 1 -->
            <strong>Juan Dela Cruz <small class="text-muted">1 second ago</small></strong><br>
            <ul class="list-unstyled">
                <li>I sell Sayote. 100 peso per Kilo. Text me 09123456789</li>
            </ul>
            <br>

            <!-- Sample Comment 2 -->
            <strong>Juan Dela Pena <small class="text-muted">1 second ago</small></strong><br>
            <ul class="list-unstyled">
                <li>I have everything. Call me</li>
            </ul>
            <br>

        </div>

    </div>
</div>

@endsection