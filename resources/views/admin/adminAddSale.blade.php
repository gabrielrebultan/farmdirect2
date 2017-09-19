@extends('layout.admin')

@section('body')

    <div class="row">
    <div class="col-md-8">

    <h1>Start Sale</h1>
    <strong>This page will be used for adding a sale per request of a farmer</strong>
    <hr>

    <form method="POST" action="{{ route('farmer.addsale') }}" class="form-horizontal" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="panel panel-success">
            
            <div class="panel-body">

                <label>Add sale for:</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="First Name" />
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Middle Initial" />
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Last Name" />
                    </div>
                </div>

                <hr>

                <div class="row">
                    <!-- Product Name -->
                    <div class="col-md-6">              
                        <label>Product.</label>
                        <small class="text-muted">Place the name of your product.</small>
                        <select class="form-control productName" id="productName" name="productName" placeholder="i.e. Sayote, Kamote" required>
                            <option disabled="true" selected="true">--Select Products--</option>
                            
                        </select>
                        
                    </div>

                    <!-- Product Variety -->
                    <div class="col-md-6" id="divvariety">
                        <label for="variety">Class / Variety.</label>
                        <small class="text-muted">Choose a variety of the product</small>
                        <select id="variety" class="form-control" name="variety" placeholder="i.e. California, Marble" >
                            
                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <!-- Price per Kg. -->
                    <div class="col-md-6">
                        <label>Price per Kg.</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Php</span>
                            <input type="number" name="price" min="0" class="form-control" aria-describedby="basic-addon1" required>
                            <span class="input-group-addon" id="basic-addon1">per Kilogram</span>
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="col-md-6">
                        <label>Quantity.</label><small class="text-muted"> How many are you selling?</small>
                        <div class="input-group">
                            <input type="number" name="quantity" min="0" class="form-control">
                            <span class="input-group-addon" id="basic-addon1">Kilograms</span>
                        </div>
                    </div>
                </div>

                <br>

                <!--Start and End Date-->
                <div class="row">
                    <div class="col-md-6">

                        <!-- Images -->
                        <label>Images.</label>
                        <small class="text-muted">Include images depicting your product.</small>
                        <input type="file" class="form-control" name="images[]" multiple required>

                        <!-- Start Date -->
                        <input type="hidden" name="sdate" value="{{ date('Y-m-d') }}"/>
                            
                    </div>
                
                    <div class="col-md-6">
                        <small>End Date</small>
                        <small class="text-muted"> of your sale.</small>
                        <input type='date' class="form-control" value="{{ old('edate') }}" name="edate"/> <!-- name = endDate -->
                    </div>
                </div>

                <br>

                <!-- Trade Instructions -->
                <label>Trade instruction</label>
                <textarea type="text" class="form-control" name="tradeInstruction" rows="5" placeholder="i.e. 'Lets meet @ Trading Post'" required></textarea>

            </div>
        
            <div class="panel-footer text-right">
                <a href="/farmer/" class="btn btn-default">Cancel</a>
                <input type="submit" class="btn btn-success" value="Submit"/>
            </div>
        
        </div>
    </form>

    </div>
    </div>

@endsection

@section('scripts')
     
    <!--for product variety/class dependency-->
    @include('partials.varietydependency')

@endsection