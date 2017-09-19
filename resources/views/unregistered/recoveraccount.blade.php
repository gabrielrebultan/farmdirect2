@extends('layout.homepage')

@section('body')

    <div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-heading">
            <h4 class="panel-title">Recover Your Account</h4>
        </div>

        <div class="panel-body">
        
            <label>Email Address</label>
            <input type="text" class="form-control" placeholder="i.e. juandc@website.com"/>
            <small class="text-muted">We will send a reset key to this email.</small>

        </div>
        <div class="panel-footer text-right">
            <a href="/homepage" class="btn btn-default">Cancel</a>
            <input type="submit" class="btn btn-default" value="Submit">
        </div>
    </div>

    </div>

@endsection