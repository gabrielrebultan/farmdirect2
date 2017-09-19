@extends('layout.master')

@section('body')

    <!-- Registration Form Here -->

   <div class="container-fluid">
    <div class="row">

        <div class=" col-md-offset-3 col-md-6">
            <h1 class="page-header">Register</h1>
            <div class="panel panel-success">
                <div class="panel-body">
                    <!--displaying of errors in registering-->
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}
                            </div>
                        @endforeach
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('custom.register') }}"> <!--custom.register is the name of the route-->
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Register as </label>
                            <div class="col-md-6">
                                <div class="btn-group" data-toggle="buttons">

                                    <label class="btn btn-primary radio-inline active">  <!-- 0=farmer account,1=buyer account-->
                                        <button type="button">
                                            <input type="radio" name="type" value="Farmer" id="option1`" autocomplete="off" checked>
                                            Farmer 
                                        </button>
                                    </label>
                                    <label class="btn btn-primary radio-inline">
                                        <button type="button">
                                            <input type="radio" name="type" value="Buyer" id="option2" autocomplete="off">
                                            Buyer
                                        </button>
                                    </label>  

                                </div>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- First Name -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="fname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Middle Name X -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="middleinitial" class="col-md-4 control-label">Middle Initial</label>

                            <div class="col-md-6">
                                <input id="middleinitial" type="text" class="form-control" name="middleinitial" value="{{ old('middleinitial') }}" required autofocus>

                                @if ($errors->has('middleinitial'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('middleinitial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Last Name  X -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="lname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Contact Num -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="contact" class="col-md-4 control-label">Contact Number</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control" name="contactno" value="{{ old('contactno') }}" required>

                                @if ($errors->has('contactno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contactno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- Register BUTTON -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection