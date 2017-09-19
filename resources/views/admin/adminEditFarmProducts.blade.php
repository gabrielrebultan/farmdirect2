@extends('layout.admin')

@section('body')

    <h3>Edit Farm Product</h1>
    <strong>Edit an existing product and its variety below.</strong>

    <div class="row">

    <!-- Add panel -->
    <div class="col-md-4">

        <hr>

        <form action="{{'/admin/'.$farmprod->id}}" method="POST">
        {{csrf_field()}}
        
        <label>Product Name</label>
        <input type="text" class="form-control" value="{{$farmprod->productName}}" name="productName" disabled>
        <br>
        
        <label>Variety.</label>
        <div class="input-group">
            <input type="text" class="form-control" name="variety">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
        </div>
        <small class="text-muted"> Temporarily add all the varieties of this new product on the LIST below. Then, click save if you're ready.</small>
        <br><br>

        <label>List</label>
        <br>

        <div style="padding:5px; border:1px solid #eee; margin-bottom:5px;"><b>No variety added yet</b></div>
        @foreach($varnames as $varname)
        <div style="padding:5px; border:1px solid #eee; margin-bottom:5px;">
            {{-- <form action="{{'/admin/edit-farm-products/'.$varname->id}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}} --}}
            <button type="submit" class="btn btn-danger btn-xs pull-right"><span class="fa fa-times"></span></button> 
            {{-- </form> --}}
            <b>{{$varname->variety}}</b>
        </div>
        @endforeach
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