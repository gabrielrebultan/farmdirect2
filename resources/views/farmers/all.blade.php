@extends('layout.app')

@section('name')

@foreach($farmers as $name)
    {{ $name->farmerName }} <br>
    <!-- object -> column name  -->
@endforeach

@endsection