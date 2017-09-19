@extends('layout.admin')

@section('body')

    <h3>Add New Farm Product</h2>
    <strong>Add a new product and its variety below.</strong>

    <div class="row">

    <!-- Add panel -->
    <div class="col-md-4">

        <hr>

        <form action="/admin/add-farm-products" method="POST">
            {{csrf_field()}}

            <label>Product Name</label>
            <input type="text" class="form-control" name="productName">
            <br>
            
            <label>Variety.</label>
            <div class="input-group">
                <input type="text" class="form-control" name="variety">
                <div class="input-group-btn">
                    <a href="#" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></a>
                </div>
            </div>
            <small class="text-muted"> Temporarily add all the varieties of this new product on the LIST below. Then, click save if you're ready.</small>
            <br><br>

            <label>List</label>
            <br>

            <div style="padding:5px; border:1px solid #eee; margin-bottom:5px;"><b>No variety added yet</b></div>
            @for($i=0; $i < 5; $i++)
            <div style="padding:5px; border:1px solid #eee; margin-bottom:5px;"><a href="#" class="pull-right"><span class="fa fa-times"></span></a> <b>Variety Name</b></div>
            @endfor
            <hr>

            <input type="submit" class="btn btn-success btn-lg" value="Save" style="width:100%;">

        </form>
        {{-- basic lang na error message --}}
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        @endif

    </div>

    </div>

@endsection