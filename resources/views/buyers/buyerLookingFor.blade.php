@extends('layout.buyer')

@section('banner')
    <header class="masthead" style="background-image: url('{{ asset('images/homepage/farmerbanner.jpg') }}'); background-attachment:fixed; background-position:center; background-position:fixed;">
        <div class="container">
            <div class="banner">
            <div class="site-heading">

                <h1><i class="fa fa-search"></i> Looking to Buy</h1>
                <b>What are you looking for? Let our farmers know what you want</b>
            
            </div>
            </div>
        </div>
    </header>
@endsection

@section('body')

<div class="row">
    <!-- Looking to buy form -->
    <div class="col-md-8">
        @if(count($lookingfor) != 1)
            <form action="{{ route('buyer.postLookingfor') }}" method="POST">
            {{csrf_field()}}
                <div class="card">
                <div class="card-body">
                    <label for="threadName"><b>Name of thread. </b></label><small>This will be the title of what you are looking for. Make it as catchy as possible</small>
                    <input class="form-control" name="threadName" type="text" placeholder="i.e. I'm getting married!" id="threadName"  required>
                    <br>

                    <label for="threadDescription"><b>Reason why you want them.</b><small> Place a note about why you want these items</small></label>
                    <textarea class="form-control" name="threadDescription" type="text" placeholder="i.e. I need to prepare a feast so I need the following." rows=7 id="threadDescription" ></textarea>
                    
                    <br>
                    

                    <!--PRODUCT ADDING-->
                    <label id="list">Select product(s) that you want and add them 1 by 1.</label>

                    <div class="card">
                    <div class="card-body">

                        <!-- Product Name -->
                        <label>Product</label> 
                        <select class="form-control productName" id="productName" name="productName" placeholder="i.e. Sayote, Kamote">
                            <option disabled="true" selected="true">--Select Product--</option>
                            @foreach($farmProducts as $product)
                                <option class="productitem" value="{{$product->id}}">{{$product->productName}}</option> 
                            @endforeach   
                        </select>

                        <br>
                        <div id="divvariety">
                            <!-- Product Variety -->
                            <label>Variety / Class</label>
                            <select id="variety" class="form-control" name="variety" placeholder="i.e. California, Marble" >
                            </select>

                            <br>

                            <!--<a href="#" id="addtolist" class="btn btn-outline-primary">Add to list below</a>-->
                            <a id="addtolist" class="btn btn-outline-info text-info" style="width:100%"><i class="fa fa-plus"></i> Add to List Below</a>
                        </div>
                    

                    </div>
                    <div id="productList" class="card-footer">

                        <b>List </b><br>
                        @if(count($inputProducts) != 0 )
                            @foreach($inputProducts as $input)
                                
                                <div class="btn-group" style="margin:5px;">
                                    <button class="btn btn-success btn-sm" disabled>{{ $input->productName }}</button>
                                    <button class="btn btn-outline-success btn-sm" disabled>{{ $input->variety }}</button>
                                    <a href="{{ route('buyer.removeproduct', $input->id) }}" class="btn btn-danger btn-sm "><span class="fa fa-trash"></span></a>
                                </div>
                            @endforeach
                        @endif

                    </div> 
                    </div>  
                    
                    <br>
                    
                </div>
                <div class="card-footer text-center"> 
                    <input type="submit" class="btn btn-outline-success btn-lg" value="Publish">
                    <a href="{{ route('buyer.cancelLookingfor') }}" class="btn btn-outline-secondary btn-lg">Cancel</a>  
                    <br><br>
                    <small>You can edit the contents of your list anytime and click publish again to let the farmers see the changes.</small>
                </div>
                </div>

            </form>
            <hr>
        @else
            <div class="bg-white">

                <h1>{{ $lookingfor[0]->title }}</h1>
                <p class="text-muted">{{ $lookingfor[0]->detail }}</p>

                <hr>

                <a href="#" class="btn btn-outline-success">Edit thread</a>
                <a href="#" class="btn btn-outline-danger">Close thread</a>
                    
            </div>
            
            <br>

            <div class="captionwhite">
                <h6>Products Looking to buy:</h6><hr>
                <?php 
                    $prods   = explode(',' , $lookingfor[0]->productName);
                    $variety = explode(',' , $lookingfor[0]->variety);
                    //$combined = array_combine($prods,$variety);
                ?>

                @for( $x = 0; $x < count($prods) ; $x++) 
                    <h2>{{$x+1}}. {{ $prods[$x] }} <small>{{ $variety[$x] }}</small></h2>
                    <br>
                @endfor
            </div>  
        @endif
    </div>
    

    <!-- Comments -->
    <div class="col-md-4">

        <div class="captiongrey-header">
            <b>Comments</b>
        </div>

        <!-- other farmer's comments -->
        <div class="captiongrey">

        <b>Juan Dela Cruz</b>
        <small>Lorem ipsum dolor sit amet, fierent voluptatibus vis eu, an ius tation molestiae democritum, cu eos summo choro. Ei recusabo voluptaria contentiones quo, id cum cibo nostrum. Duo omnesque adolescens cu, movet graeco id sit, in dico facer aeterno vim. Id dictas tamquam sit, at nam vide philosophia, vix ad solum mundi.</small>
        
        <br>

        <b>Juan Dela Pena <small>1 second ago</small></b><br>
        <ul class="list-unstyled">
            <li>I have everything. Call me</li>
        </ul>
        <br>

        </div>

    </div>
</div>

@endsection
@section('scripts')
    <!--product-variety dependency-->
    @include('partials.varietydependency')

    <script type="text/javascript">
        $(document).ready(function(){
            
            $('#addtolist').click(function(){
                prod = $('#productName').val();
                vari = $('#variety').val(); 
                console.log('prod name '+prod);
                console.log('var '+vari);
                if(prod != null && vari != null){
                    $.ajax({
                        type:'get',
                        url:"{!!URL::to('addLookingToBuy')!!}",
                        data:{'productName':prod,'variety':vari},
                        success:function(data){
                            $("#productList").load("/buyer/looking-for #productList"); 
                            $('#productName').val("--Select Another--");
                            $('#variety').val("--Select Another--");                        
                        }

                    });
                }
                
                    
            });
        });
    </script>

@endsection