@extends('layout.farmer')

@section('banner')

    <header class="masthead" style="background-image: url('{{ asset('images/homepage/farmerbanner.jpg') }}'); background-attachment:fixed; background-position:left; background-position:fixed;">
        <div class="container">
            <div class="banner">
            <div class="site-heading">

                <h1><i class="fa fa-plus"></i> POST SALE</h1>

            </div>
            </div>
        </div>
    </header>

@endsection

@section('body')

    <div class="row">
        <div class="col-md-3">
            <div class="caption222">
                Reminders<hr>
                You cannot cancel the sale once you accept bids.<br><br>
                The sale starts once you click submit. Make sure your product is really ready for sale.<br><br>
                Once the sale ends, you can always "re-open" your sale as long as there are still remaining products.<br><br>
                ALL FIELDS ARE REQUIRED to start a sale. PLEASE FILL THEM ALL UP.
            </div>
        </div>
        <div class="col-md-9">

            <div class="bg-white">

            <!-- ADD NEW SALE FORM -->
            <form method="POST" action="{{ route('farmer.addsale') }}" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">
                    <!-- Product Name -->
                    <div class="col-md-6"> 

                        <label>Product</label>
                        <select class="form-control productName" id="productName" name="productName" placeholder="i.e. Sayote, Kamote" required>
                            <option disabled="true" selected="true">--Select Product--</option>
                            @foreach($farmProducts as $product)
                                <option class="productitem" value="{{$product->id}}">{{$product->productName}}</option> 
                            @endforeach
                        </select>
                        
                    </div>

                    <!-- Product Variety -->
                    <div class="col-md-6" id="divvariety">
                        <label>Class / Variety</label>
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
                            <input type="number" name="price" min="0" value="{{ old('price') }}" class="form-control" aria-describedby="basic-addon1" required>
                            <span class="input-group-addon" id="basic-addon1">per Kilogram</span>
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="col-md-6">
                        <label>Quantity</label>
                        <div class="input-group">
                            <input type="number" name="quantity" min="0" value="{{ old('quantity') }}" class="form-control" required>
                            <span class="input-group-addon">Kilograms</span>
                        </div>
                    </div>
                </div>

                <br>

                <!--Start and End Date-->
                <div class="row">
                    <div class="col-md-6">

                        <!-- Images -->
                        <div class="{{ $errors->has('images') ? ' has-error' : '' }}">
                            <label>Images / Images</label>
                            <input type="file" class="form-control" value="{{ old('images') }}" name="images[]" multiple required>

                                @if ($errors->has('images'))
                            <span class="help-block">
                                <label>{{ $errors->first('images') }}</label>
                            </span>
                            @endif
                        </div>

                        <input type='hidden' name="sdate" value="{{ date('Y-m-d')}}"/>
                        
                    </div>
                
                    <div class="col-md-6">
                        <div class="{{ $errors->has('edate') ? ' has-error' : '' }}">
                            <label>End Date</label>
                            <div class='input-group date' id='endDate'>
                                <input type='text' class="form-control" value="{{ old('edate') }}" name="edate"/> <!-- name = endDate -->
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                            @if ($errors->has('edate'))
                            <span class="help-block">
                                <label>{{ $errors->first('edate') }}</label>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                </div>

                <br>

                <!-- Trade Instructions -->
                <label>Trade instruction.</label>
                <textarea type="text" class="form-control" name="tradeInstruction" rows="5" placeholder="How do you want to trade your with your buyers?" required></textarea>

                <hr>

                <input type="submit" class="btn btn-success btn-lg" value="Submit"/>
                <a href="{{ route('farmer.homepage') }}" class="btn btn-outline-secondary btn-lg">Cancel</a>
                
                
            
            </form>

            </div>

        </div>
    </div>

@endsection


@section('scripts')
     

    <!--for product variety/class dependency-->
    @include('partials.varietydependency')

    <!-- for dates -->

    <script type="text/javascript">
    
        $(function () {
            $('#startDate').datetimepicker({
                format: "YYYY-MM-DD"
            });
            $('#endDate').datetimepicker({
                useCurrent: false, //Important! See issue #1075
                format: "YYYY-MM-DD",
                minDate: moment()
            });
            $("#startDate").on("dp.change", function (e) {
                $('#endDate').data("DateTimePicker").minDate(e.date);
            });
            $("#endDate").on("dp.change", function (e) {
                $('#startDate').data("DateTimePicker").maxDate(e.date);
            });
        });
    
    </script>

@endsection