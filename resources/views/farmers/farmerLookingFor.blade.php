@extends('layout.farmer')

@section('styles')
    <style>
        .card-body{
            height: 200px;
        }
        .card-body h4{
            word-wrap: break-word;
        }
        .ellipsis {
            text-overflow: ellipsis;

            /* Required for text-overflow to do anything */
            white-space: nowrap;
            overflow: hidden;
        }
    </style>
@endsection

@section('banner')

<header class="masthead" style="background-image: url('{{ asset('images/homepage/farmerbanner.jpg') }}'); background-attachment:fixed; background-position:center; background-position:fixed;">
    <div class="container">
        <div class="banner">
        <div class="site-heading">

            <h1><i class="fa fa-search"></i> LOOKING TO BUY</h1>
            <b>Find out what our buyers are looking for.</b>

        </div>
        </div>
    </div>
</header>


@endsection

@section('body')

    <!--Search Box-->
    <div class="input-group">
        <input type="text" id="searchProduct" name="searchProduct" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button class="btn btn-warning" type="button"><i class="fa fa-search"></i></button>
        </span>
    </div>

    <br>

    <section id="pinBoot">
        @if(count($threads) != 0)
            @foreach($threads as $t)

            <article class="white-panel">

                <h2 class="card-title text-success">{{ $t->title }}</h2>
                
                <div class="ellipsis">
                <p>{{$t->detail}}</p>
                </div>

                <small>Posted: <b class="text text-warning">{{ $t['user']['created_at']->diffForHumans() }}</b></small><br>
                <small>Posted by:<b class="text text-success"> {{ $t['user']['fname'].' '.$t['user']['middleinitial'].'. '.$t['user']['lname'] }}</b></small>
            
                <hr>

                <a href="{{ route('farmer.viewLookingfor',$t->id) }}" class="btn btn-outline-success">View List</a> 
            
            </article>
            @endforeach
        @else
            @include('partials.noresult')
        @endif

    </section>


@endsection
@section('scripts')
    @include('partials.searchAutoComplete')
@endsection