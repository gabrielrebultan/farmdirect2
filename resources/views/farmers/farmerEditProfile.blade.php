@extends('layout.farmer')

@section('banner')

    <header class="masthead" style="background-image: url('{{ asset('images/homepage/farmerbanner.jpg') }}'); background-attachment:fixed; background-position:center; background-position:fixed;">
        <div class="container">
            <div class="banner">
            <div class="site-heading">

                <h1><i class="fa fa-user"></i> PROFILE</h1>
                <b>Monitor your profile here</b>

            </div>
            </div>
        </div>
    </header>

@endsection

@section('body')

<div class="row">
    <div class="col-md-3">

        <div class="bg-white">
            <h4>{{$userdetails->fname.' '.$userdetails->middleinitial.'. '.$userdetails->lname}}</h4>
        </div>
        <br>

        <div class="caption222">
            <label>Average Rating</label>
            <input id="rateoffarmer" name="input-name" type="number" class="rating" step=".1" data-size="xs" disabled value="4.7">
            <small>XXX people rated you.</small>
        </div>

    </div>
    <div class="col-md-6">

        @include ('partials.flashmessage')

        <!-- Profile -->
        <div class="caption222">

            <h5>Contact Information</h5>
            <small>Last updated: {{ date('F d, Y') }}</small>
            <hr>
            <!--displaying of errors-->
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                <span class="text-danger">{{$error}}</span><br>
                @endforeach
            @endif

            <form class="form-horizontal" method="POST" action="{{ route('farmer.editprofile') }}" >
                {{csrf_field()}}

                <small>Email Address</small>
                <input type="email" class="form-control" name="email" id="email" value="{{$userdetails->email}}"  placeholder="juandelacruz@gmail.com"  required disabled/> 
                
                <br>

                <small>Contact Number</small>
                <input type="text" class="form-control" name="contactno" id="contact" value="{{$userdetails->contactno}}"  placeholder="+639/09-123456789" required disabled/> 

                <br>

                <button id="editProfileButton" type="button" class="btn btn-outline-success">Edit</button>
                <button id="cancelEditProfile" type="button" class="btn btn-outline-secondary" style="display:none;">Cancel</button>
                <input id="saveEditProfile" type="submit" class="btn btn-success" style="display:none;" value="Save">

            </form>

            <hr>

            <!-- Subscription -->
            <label for="subscriptionStatus">Subscription</label>
            <h1>Premium</h1>
            <small>End date of subscription:</small>
            <b>{{ date('Y F d') }}</b>

        </div>

        <div class="profile">

            <h5>Password</h5>
            <small>Last updated: {{ date('F d, Y') }}</small>

            <hr>

            <button class="btn btn-outline-success clickable">Change Password</button>
            <div class="change-password collapse">

                <br>
                <form class="form-horizontal" method="POST" action="{{ route('farmer.changepassword') }}" >
                    {{csrf_field()}}

                    <label>Current password</label>
                    <input type="password" name="oldpassword" class="form-control" required>
                    <br>

                    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>New password</label>
                        <input type="password" name="password" class="form-control" required>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <b>{{ $errors->first('password') }}</b>
                        </span>
                        @endif
                    </div>    
                    <br>
                
                    <label>Confirm New password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                        
                    <br>
                        
                    <input type="submit" class="btn btn-success" value="Save">

                </form>

            </div>
            
        </div>
        <br>

    </div>

    <div class="col-md-3">

        <div class="caption3-header">
            <b>Feedbacks</b>
            <small>The following are from people you transacted with</small>
        </div>

        <div class="caption3">
            <b>Juan Dela Cruz </b>
            <small>Lorem ipsum dolor sit amet, fierent voluptatibus vis eu, an ius tation molestiae democritum, cu eos summo choro. Ei recusabo voluptaria contentiones quo, id cum cibo nostrum. Duo omnesque adolescens cu, movet graeco id sit, in dico facer aeterno vim. Id dictas tamquam sit, at nam vide philosophia, vix ad solum mundi.</small>
            <hr>
        </div>

    </div>
</div>    


@endsection

@section('scripts')

    <script>
        //rate style
        $("#rateoffarmer").rating({showClear:false});
    </script>

    <script>
        //profile edit button clicked
        $(document).ready(function(){
            $("#editProfileButton").click(function(){
                $("#cancelEditProfile").show();
                $("#saveEditProfile").show();
                $("#editProfileButton").hide();
                $("#email").prop('disabled', false);
                $("#contact").prop('disabled', false);
            });
            $("#cancelEditProfile").click(function(){
                $("#cancelEditProfile").hide();
                $("#saveEditProfile").hide();
                $("#editProfileButton").show();
                $("#email").prop('disabled', true);
                $("#contact").prop('disabled', true);
            });
        });
    </script>

    <script>
        //Password
        $(document).on('click', '.profile button.clickable', function(e){
            var $this = $(this);
            if(!$this.hasClass('collapsed')) {
                $this.parents('.profile').find('.change-password').slideDown();
                $this.parents('.profile').find('button.clickable').html('Cancel');
                $this.addClass('collapsed');
            } else {
                $this.parents('.profile').find('.change-password').slideUp();
                $this.parents('.profile').find('button.clickable').html('Change Password');
                $this.removeClass('collapsed');
            }
        })
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