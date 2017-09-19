@extends('layout.admin')

@section('body')

    <h1>Reports</h1>
    <hr>

    <b>Below is the list of existing farm products that are being sold in the system.</b>
    <a href="#" class="btn btn-success pull-right"><i class="fa fa-print"></i> Print</a>
    <hr>
    <table width="100%" class="table table-hover table-bordered" id="farmproducts">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Varieties</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
