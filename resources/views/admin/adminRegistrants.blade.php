@extends('layout.admin')

@section('body')

    <h1>Registrants</h1>
    <span style="pull-right">The following are the users that you have not authenticated yet</span>
    <hr>
    <table width="100%" class="table table-bordered table-hover" id="users">
        <thead>
            <tr>
                <th>Name</th>
                <th>Applying as</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($registrants as $registrant)
            <tr class="odd gradeX">
                <td>{{$registrant->fname.' '.$registrant->middleinitial.' '.$registrant->lname}}</td>
                <td>{{$registrant->type}}</td>
                <td>
                    <form action="{{'/admin/registrants/'.$registrant->id}}" method="POST">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i> Activate</button>
                    </form>
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
            "dom": '<"top"f>rt<"bottom"pi><"clear">'
        });
    });
    </script>

@endsection