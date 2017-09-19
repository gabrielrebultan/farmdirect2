@extends('layout.admin')

@section('body')

    <h1>
        Sales
        <!-- <a href="/admin/add-sale" class="btn btn-success"><i class="fa fa-plus"></i> Add sale</a>-->
    </h1>
    <strong>The following are the sales that are / have been posted in the system</strong>
    <hr>

    <table width="100%" class="table table-striped table-bordered table-hover" id="sales">
        <thead>
            <tr>
                <th>Product</th>
                <th>Started by</th>
                <th>Variety</th>
                <th>Quantity</th>
                <th>Price/kg.</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($farmers as $farmer)
            <tr class="odd gradeX">
                <td>
                    <ol>
                    @foreach($farmer->postedproduct->pluck('productName') as $productName)
                        <li><strong>{{ $productName }}</strong></li>
                    @endforeach
                    </ol>
                </td>
                <td>{{$farmer->fname.' '.$farmer->middleinitial.'. '.$farmer->lname}}</td>
                <td>
                    <ol>
                    @foreach($farmer->postedproduct->pluck('variety') as $variety)
                        <li><strong>{{ $variety }}</strong></li>
                    @endforeach
                    </ol>
                </td>
                <td>
                    <ol>
                    @foreach($farmer->postedproduct->pluck('quantity') as $quantity)
                        <li><strong>{{ $quantity }}</strong></li>
                    @endforeach
                    </ol>
                </td>
                <td>
                    <ol>
                    @foreach($farmer->postedproduct->pluck('price') as $price)
                        <li><strong>{{ $price }}</strong></li>
                    @endforeach
                    </ol>
                </td>
                <td>
                    <ol>
                    @foreach($farmer->postedproduct->pluck('sdate') as $sdate)
                        <li><strong>{{$sdate }}</strong></li>
                    @endforeach
                    </ol>
                </td>
                <td>
                    <ol>
                    @foreach($farmer->postedproduct->pluck('edate') as $edate)
                        <li><strong>{{$edate}}</strong></li>
                    @endforeach
                    </ol>
                </td>
                <td>
                    <a href="/admin/edit-sale" class="btn btn-success btn-sm"> Edit</a>
                </td>
            </tr>
           
            @endforeach
           
          

        </tbody>
    </table>

@endsection

@section('Datatable')

    <script>
    $(document).ready(function() {
        $('#sales').DataTable({
            responsive: true,
            "dom": '<"top"f>rt<"bottom"p><"clear">'
        });
    });
    </script>

@endsection