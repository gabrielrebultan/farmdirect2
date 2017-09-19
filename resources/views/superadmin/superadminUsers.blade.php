@extends('layout.admin')

@section('body')

    <h1 class="page-header">Users</h1>
    <table width="100%" class="table table-striped table-bordered table-hover" id="users">
        <thead>
            <tr>
                <th>Name</th>
                <th>User Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd gradeX">
                <td>Gabriel A. Rebultan</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Ryan S. Motal</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Allan X. Ternola</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Nellbrick S. Ramos</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Gabriel A. Rebultan</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Ryan S. Motal</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Allan X. Ternola</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Nellbrick S. Ramos</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Gabriel A. Rebultan</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Ryan S. Motal</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Allan X. Ternola</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Nellbrick S. Ramos</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Archive</a>
                </td>
            </tr>
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