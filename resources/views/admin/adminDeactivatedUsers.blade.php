@extends('layout.admin')

@section('body')

    <h1>Deactivated Users</h1>
    <strong>The following users are the ones you deactivated or have been automatically deactivated by the system.</strong>
    <hr>

    <table width="100%" class="table table-striped table-bordered table-hover" id="users">
        <thead>
            <tr>
                <th>Name</th>
                <th>User Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($deactivateds as $deactivated)
            <tr class="odd gradeX">
                <td>{{$deactivated->fname.' '.$deactivated->middleinitial.' '.$deactivated->lname}}</td>
                <td>{{$deactivated->type}}</td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm"> Delete</a>
                    <a href="#" class="btn btn-warning btn-sm"> Re-activate</a>
                </td>
            </tr>
            @endforeach
            

        </tbody>
    </table>

@endsection

@section('Datatable')

    <script>
    $(document).ready(function() {
        $('#users').DataTable({
            responsive: true,
            "dom": '<"top"f>rt<"bottom"p><"clear">'
        });
    });
    </script>

@endsection