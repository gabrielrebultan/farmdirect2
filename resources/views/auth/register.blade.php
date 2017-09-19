@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">

        <div class="col"></div>
        <div class="col-md-6">

            @section('title')
            <h1 class="page-header">Register</h1>
            <br>
            @show()

            <form role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="row">
                <div class="col-md-6">

                    <label>Register as </label>
                    @section('utype')
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="width:100%;">
                        
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-success active">  <!-- 0=farmer account,1=buyer account-->
                                <input type="radio" name="userType" autocomplete="off" value="Farmer" checked >
                                Farmer 
                            </label>
                            <label class="btn btn-success">
                                <input type="radio" name="userType" autocomplete="off" value="Buyer">
                                Buyer
                            </label>  
                        </div> 

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif

                    </div>
                    @show()

                    <!-- First Name -->
                    <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">

                        <label for="fname">First Name</label>

                        <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autofocus>

                        @if ($errors->has('fname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fname') }}</strong>
                        </span>
                        @endif
                    </div>

                    <!-- Middle Name X -->
                    <div class="form-group{{ $errors->has('middleinitial') ? ' has-error' : '' }}">

                        <label for="middleinitial">Middle Initial</label>

                        <input id="middleinitial" type="text" class="form-control" name="middleinitial" value="{{ old('middleinitial') }}" required autofocus>

                        @if ($errors->has('middleinitial'))
                        <span class="help-block">
                            <strong>{{ $errors->first('middleinitial') }}</strong>
                        </span>
                        @endif

                    </div>

                    <!-- Last Name  X -->
                    <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                        <label for="lname">Last Name</label>

                        <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autofocus>

                        @if ($errors->has('lname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lname') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
                <div class="col-md-6">

                    <!-- Email -->
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <label for="email">E-Mail Address</label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <!-- Contact Num -->
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <label for="contact">Contact Number</label>

                        <input id="contact" type="text" class="form-control" name="contactno" value="{{ old('contactno') }}" required>

                        @if ($errors->has('contactno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contactno') }}</strong>
                        </span>
                        @endif

                    </div>

                    <!-- Password -->
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <label for="password">Password</label>

                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">

                        <label for="password-confirm">Confirm Password</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        
                    </div>

                </div>
                </div>

                <br>

                <!-- Register BUTTON -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success" style="width:100%;">
                        @yield('regbtn') Register
                    </button>
                </div>

            </form>
                
        </div>
        <div class="col"></div>

    </div>
</div>
@endsection
