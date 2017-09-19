@extends('layout.admin')

@section('body')

    <h1>
    Farm Products
    <a href="/admin/add-farm-products/" class="btn btn-success pull-right">ADD NEW FARM PRODUCT</a>
    </h1>
    <strong>The following are the farm products that are currently being traded in the trading center.</strong>
    <hr>
    
    <table width="100%" class="table table-bordered table-hover" id="farmproducts">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Varieties</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($farmproducts as $farmproduct)
            <tr class="odd gradeX">
                <td>{{$farmproduct->productName}}</td>
                <td> 
                @for($i=0 ; $i < count($farmproduct->variety->pluck('variety')); $i++)
                    <strong>{{ $farmproduct->variety->pluck('variety')[$i] }}</strong>
                    {{ $i != count($farmproduct->variety->pluck('variety'))-1 ? ',': '' }} 
                @endfor
                </td>
                <td>
                    <a href="{{'/admin/edit-farm-products/'.$farmproduct->id}}" class="btn btn-success btn-sm">Edit</a>
                    {{-- Nagbago ung design kse sa new form ^^ sry gabo  --}}
                    <form class="form-group" action="{{'/admin/farm-products/'.$farmproduct->id}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
        $('#farmproducts').DataTable({
            responsive: true,
            "dom": '<"top"f>rt<"bottom"p><"clear">'
        });
    });
    </script>

@endsection