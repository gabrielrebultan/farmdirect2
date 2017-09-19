@extends('layout.admin')

@section('body')

<div class="row">
<div class="col-md-4">

    <h3>Add New System Personnel</h3>
    <small>Default password is 1</small>
    <hr>

    <!--displaying of errors in registering-->
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}
            </div>
        @endforeach
    @endif

    <form role="form" method="POST" action="{{ route('admin.register') }}">

        {{csrf_field()}}

        <!-- User type as system personnel -->
        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">   
            <input hidden type="radio" name="userType" value="System Personnel" checked>
        </div>

        <!-- First Name -->
        <div class="{{ $errors->has('fname') ? ' has-error' : '' }}">
            <label for="fname" >First Name</label>

            <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autofocus>

            @if ($errors->has('fname'))
                <span class="help-block">
                    <strong>{{ $errors->first('fname') }}</strong>
                </span>
            @endif

        </div>
        <br>

        <!-- Middle Name -->
        <div class="{{ $errors->has('middleinitial') ? ' has-error' : '' }}">
            <label for="middleinitial" >Middle Initial</label>

            <input id="middleinitial" type="text" class="form-control" name="middleinitial" value="{{ old('middleinitial') }}" required autofocus>

            @if ($errors->has('middleinitial'))
                <span class="help-block">
                    <strong>{{ $errors->first('middleinitial') }}</strong>
                </span>
            @endif

        </div>
        <br>

        <!-- Last Name -->
        <div class="{{ $errors->has('lname') ? ' has-error' : '' }}">
            <label for="lname" >Last Name</label>

            <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autofocus>

            @if ($errors->has('lname'))
                <span class="help-block">
                    <strong>{{ $errors->first('lname') }}</strong>
                </span>
            @endif

        </div>
        <br>

        <!-- Email -->
        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" >E-Mail Address</label>

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <br>

        <!-- Contaact Num -->
        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="contact" >Contact Number</label>

            <input id="contact" type="text" class="form-control" name="contactno" value="{{ old('contactno') }}" required>

            @if ($errors->has('contactno'))
                <span class="help-block">
                    <strong>{{ $errors->first('contactno') }}</strong>
                </span>
            @endif
        </div>

        <!-- DEFAULT PASSWORD = 1 -->

        <input type="hidden" value="1" name="password" />
            
        <hr>
    
        <!-- Register BUTTON -->      
        <button type="submit" class="btn btn-success" style="width:100%;">
            @yield('regbtn') Register
        </button>

    </form>

</div>
</div>

@endsection



