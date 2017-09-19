@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h1 class="page-header">Log-in</h1>
            <br>

            <form role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-12">
                    
                        <!-- Email Address -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <label>Email-address</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="juan@gmail.com">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Password -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <label>Password</label>

                            <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <!-- Remember Password -->
                        <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                <div class="col">

                    <!-- Login & Forgot Password -->
                    <button type="submit" class="btn btn-success" style="width:100%;">
                        Login
                    </button>

                </div>
                </div>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>

                </div>
            </form>
               
        </div>
    </div>
    
</div>
@endsection
