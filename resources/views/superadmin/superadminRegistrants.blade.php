@extends('layout.admin')

@section('body')

    <h1 class="page-header">Registrants</h1>
    <table width="100%" class="table table-striped table-bordered table-hover" id="users">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @for($i=0; $i <=3; $i++)
            <tr class="odd gradeX">
                <td>Gabriel A. Rebultan</td>
                <td>
                    <a href="#" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Accept</a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Reject</a>
                    <a href="#" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-info"></i> Applicant Info</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Ryan S. Motal</td>
                <td>
                    <a href="#" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Accept</a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Reject</a>
                    <a href="#" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-info"></i> Applicant Info</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Allan X. Ternola</td>
                <td>
                    <a href="#" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Accept</a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Reject</a>
                    <a href="#" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-info"></i> Applicant Info</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Nellbrick S. Ramos</td>
                <td>
                    <a href="#" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Accept</a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Reject</a>
                    <a href="#" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-info"></i> Applicant Info</a>
                </td>
            </tr>
            @endfor

        </tbody>
    </table>

@endsection

@section('Datatable')

    <script>
    $(document).ready(function() {
        $('#users').DataTable({
            responsive: true
        });
    });
    </script>

@endsection