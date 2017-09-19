@extends('layout.buyer')

@section('modal')

    <!-- Rate Modal -->
    <div class="modal fade" id="rate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Rate</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">

                <div class="row text-center">
                    <div class="col-md-4">
                        <!-- Rating Input -->
                        <input id="rateBuyer" name="input-name" type="number" class="rating" step=1 data-size="xs"><hr>
                        <small class="text-muted">Rate this buyer. 1 as the lowest rate and 5 as the highest rate.</small>
                    </div>

                    <div class="col-md-8">
                        <!-- Feedback Input -->
                        <textarea class="form-control" placeholder="Send feedback to this farmer! (NOT REQUIRED)" rows="8"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success btn-sm">Submit</button>
            </div>
            </div>
        </div>
    </div>

@endsection

@section('banner')
    <header class="masthead" style="background-image: url('{{ asset('images/homepage/farmerbanner.jpg') }}'); background-attachment:fixed; background-position:center; background-position:fixed;">
        <div class="container">
            <div class="banner">
            <div class="site-heading">
                <h1><i class="fa fa-star"></i> TRANSACTION HISTORY</h1>
                <b>The following are the farmers you transacted with.</b>
            </div>
            </div>
        </div>
    </header>
@endsection

@section('body')

    @for($i = 0; $i <= 5; $i++)
    <div class="row">
        <div class="col-md-8">

            <!-- Sample of 1 transaction history -->
            <div class="otherbid">
                    
                <h5>Juan D. Cruz <small>09123456789</small></h5>

                <div class="row">
                    <div class="col-md-3">
                        <small>Product: </small><strong>Sayote</strong>
                    </div>
                    <div class="col-md-3"> 
                        <small>Price: </small><strong>PhP 100,000</strong>
                    </div>
                    <div class="col-md-3">
                        <small>Quantity: </small><strong>50 kg.</strong>
                    </div>
                    <div class="col-md-3">
                        <small>Bid Price / Kg: </small><strong>20</strong>
                    </div>
                </div>
                    
                <hr>

                <!-- Pag na rate na -->
                <button class="btn btn-outline-success btn-sm" disabled>Rated <i class="fa fa-check"></i></button>

                <!-- Pag di pa -->
                <a href="#" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#rate" data-whatever="Juan D. Cruz">
                    <i class="fa fa-star"></i> Rate
                </a>

            </div>
            <br>
            <!-- END OF Sample of 1 transaction history -->

        </div>
        <div class="col"></div>
    </div> 
    @endfor

@endsection

@section('scripts')

    <script src="{{ asset('js/star-rating.js') }}"></script>
    <script>
        $("#rateBuyer").rating({step:1, size:'xs', showClear:false, showCaption:false});
    </script>
    <script>
        $('#rate').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Rate ' + recipient)
        })
    </script>

@endsection