@extends('layout.admin')

@section('body')

    <h1>Edit Sale</h1>
    <strong>Edit an existing sale? Make sure you have the farmer's permission.</strong>
    <hr>

    <div class="row">
        <!-- Product Name -->
        <div class="col-md-6">              
            <label>Product</label>
            <select class="form-control" name="productName" placeholder="i.e. Sayote, Kamote" required>
                <option></option>
            </select>
            <small class="text-muted">Choose the name of your product above.</small>
        </div>

        <!-- Product Variety -->
        <div class="col-md-6">
            <label for="variety">Class/Variety</label>
            <select id="variety" class="form-control" name="variety" placeholder="i.e. California, Marble" >
                
            </select>
            <small class="text-muted">Choose a viriety of the product</small>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <label>Price per Kg.</label>
            <div class="input-group">
                <span class="input-group-addon">Php</span>
                <input type="number" class="form-control" min="0">
                <span class="input-group-addon">per Kilogram</span>
            </div>
        </div>
        <div class="col-md-6">
            <label>Quantity</label>
            <input type="number" class="form-control" min="0">
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <label>Images.</label>
            <input type="file" class="form-control" name="images[]" multiple required>
        </div>

        <div class="col-md-6">
            <label>End Date</label>
            <input type='date' class="form-control" name="edate"/> <!-- name = endDate -->
            
        </div>
    </div>

    <hr>

    <label>Trade instruction</label>
    <textarea type="text" class="form-control" rows="5" placeholder="Lets meet @ Trading Post">
    </textarea>

    <hr>

    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-success btn-sm">Save changes</button>
    

@endsection

@section('scripts')

@endsection
