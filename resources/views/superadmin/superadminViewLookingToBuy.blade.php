@extends('layout.admin')

@section('body')

    <h1 class="page-header">Looking to buy</h1>

    <table width="100%" class="table table-striped table-bordered table-hover" id="lookingtobuy">
        <thead>
            <tr>
                <th>Buyer</th>
                <th>Product</th>
                <th>Variety</th>
            </tr>
        </thead>
        <tbody>

            @for($i=0; $i <= 3; $i++)
            <tr class="odd gradeX">
                <td>Gabriel A. Rebultan</td>
                <td>Sayote</td>
                <td>Large</td>
            </tr>
            <tr class="odd gradeX">
                <td>Ryan S. Motal</td>
                <td>Potato</td>
                <td>Large</td>
            </tr>
            <tr class="odd gradeX">
                <td>Allan X. Ternola</td>
                <td>Mango</td>
                <td>Indian</td>
            </tr>
            <tr class="odd gradeX">
                <td>Nellbrick S. Ramos</td>
                <td>Pechay</td>
                <td>Large</td>
            </tr>
            @endfor

        </tbody>
    </table>

@endsection

@section('Datatable')

    <script>
    $(document).ready(function() {
        $('#lookingtobuy').DataTable({
            responsive: true
        });
    });
    </script>

@endsection