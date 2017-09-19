@extends('layout.admin')

@section('body')

    <div class="row">
    <div class="col-md-8">

        <h1>Edit User Profile</h1>
        <strong>Edit a specific user here.</strong>
        <hr>

        <div class="panel panel-success">
            <form action="{{'/admin/edit-user/'.$users->id}}" method="POST">
            {{csrf_field()}}
            <div class="panel-body">
                
                <label for="fname">First Name</label>
                <input class="form-control" type="text" name="fname" value="{{$users->fname}}" /><br>

                <label for="fname">Middile Initial</label>
                <input class="form-control" type="text" name="middleinitial" value="{{$users->middleinitial}}" /><br>

                <label for="fname">Last Name</label>
                <input class="form-control" type="text" name="lname" value="{{$users->lname}}" /><br>

                <label for="fname">Contact</label>
                <input class="form-control" type="text" name="contactno"  value="{{$users->contactno}}"/><br>

                <label for="fname">Email</label>
                <input class="form-control" type="text" name="email" value="{{$users->email}}" /><br>

            </div>

            <div class="panel-footer text-right">

                <input type="submit" class="btn btn-success" value="Save">
                <a href="/admin/users" type="button" class="btn btn-default">Cancel</a>
                
            </div>
            </form>
        </div>

    </div>
    </div>

@endsection