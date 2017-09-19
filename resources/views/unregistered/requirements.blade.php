@extends('layout.homepage')

@section('body')
    <div class="container text-center" style="padding:30px 0;">

        <h1 class="text-success">Your account has been successfully created!</h1>
        <p>to access your account, follow these steps:</p>

        <hr>

        <div class="bg-white">
            <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3>1. Go to our nearest office and follow-up your account.</h3>
                    <p class="lead">We will validate if you are a valid Farmer. if you're a buyer just present us your valid ID.</p>
                </div>
            </div>
            </div>
        </div>

        <hr>

        <div class="bg-white" id="about">
            <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3>2. Head to our headquarters!</h3>
                    <p class="lead">Let us activate your account</p>
                    <iframe width="90%" height="450" frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ9e5n5rOjkTMRjRqZRTNTdmc&key=AIzaSyDIgDL34mjcZB2PCkUg7m_nu8T1LDIJ2Ds" allowfullscreen>
                    </iframe>
                </div>
            </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h3>3. Log-in your account</h3>
                <p class="lead">That's it! You can now access your account. Enjoy!</p>
            </div>
        </div>        
        
    </div>

@endsection

