@extends('layout.admin')

@section('body')

    <h1 class="page-header">Feedback</h1>

    //Feedbacks here

@endsection

@section('Datatable')

    <script>
    $(document).ready(function() {
        $('#users').DataTable({
            responsive: true
        });
    });
    </script>

@endsection