@extends('layout.admin')

@section('body')

    <h1 class="page-header">
        Sales <a href="/admin/add-sale" class="btn btn-success">Add sale</a>
    </h1>

    <table width="100%" class="table table-striped table-bordered table-hover" id="sales">
        <thead>
            <tr>
                <th>Farmer</th>
                <th>Product</th>
                <th>Variety</th>
                <th>Quantity</th>
                <th>Price/kg.</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @for($i=0; $i <= 3; $i++)
            <tr class="odd gradeX">
                <td>Gabriel A. Rebultan</td>
                <td>Sayote</td>
                <td>Large</td>
                <td>100</td>
                <td>100</td>
                <td>{{ date('F d Y') }}</td>
                <td>{{ date('F d Y') }}</td>
                <td>
                    <a href="/admin/edit-sale/" class="btn btn-success btn-sm"> Edit</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Ryan S. Motal</td>
                <td>Potato</td>
                <td>Large</td>
                <td>100</td>
                <td>100</td>
                <td>{{ date('F d Y') }}</td>
                <td>{{ date('F d Y') }}</td>
                <td>
                    <a href="/admin/edit-sale/" class="btn btn-success btn-sm"> Edit</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Allan X. Ternola</td>
                <td>Mango</td>
                <td>Indian</td>
                <td>100</td>
                <td>100</td>
                <td>{{ date('F d Y') }}</td>
                <td>{{ date('F d Y') }}</td>
                <td>
                    <a href="/admin/edit-sale/" class="btn btn-success btn-sm"> Edit</a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <td>Nellbrick S. Ramos</td>
                <td>Pechay</td>
                <td>Large</td>
                <td>100</td>
                <td>100</td>
                <td>{{ date('F d Y') }}</td>
                <td>{{ date('F d Y') }}</td>
                <td>
                    <a href="/admin/edit-sale/" class="btn btn-success btn-sm"> Edit</a>
                </td>
            </tr>
            @endfor

        </tbody>
    </table>

@endsection

@section('Datatable')

    <script>
    $(document).ready(function() {
        $('#sales').DataTable({
            responsive: true
        });
    });
    </script>

@endsection