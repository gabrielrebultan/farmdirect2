@extends('layout.admin')

@section('body')

    <h1>Looking to buy</h1>
    <hr>    

    <table width="100%" class="table table-striped table-bordered table-hover" id="lookingtobuy">
        <thead>
            <tr>
                <th>Buyer</th>
                <th>Product</th>
                <th>Variety</th>
            </tr>
        </thead>
        <tbody>

            @foreach($buyers as $buyer)
            <tr class="odd gradeX">
                <td>{{$buyer->fname.' '.$buyer->middleinitial.' '.$buyer->lname}}</td>
                <td>Sayote</td>
                <td>Large</td>
            </tr>
           @endforeach
            

        </tbody>
    </table>

@endsection

@section('Datatable')

    <script>
    $(document).ready(function() {
        $('#lookingtobuy').DataTable({
            responsive: true,
            "dom": '<"top"f>rt<"bottom"p><"clear">'
        });
    });
    </script>

@endsection