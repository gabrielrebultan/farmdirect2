@extends('layout.admin')

@section('body')

<h1>Feedbacks</h1> 
<strong>The following are feedbacks from registered and unregistered users of the system.</strong>
<hr>

<div class="row">
<div class="col-md-8">

    <table width="100%" class="table table-striped table-bordered table-hover" id="feedbacks">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @for($a = 0; $a < 3; $a++)
            <tr class="odd gradeX">
                <td>Juan Dela Cruz</td>
                <td>
                    <!-- edit/{id} -->
                    <a href="#" class="btn btn-success btn-sm"><span class="fa fa-envelope-open"></span> View Feedback</a>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>

</div>
<div class="col-md-4">

    <label for="message">Feedback</label>
    <div class="panel panel-success" id="message">
        <div class="panel-body">
            <p>Lorem ipsum dolor sit amet, te mutat congue sea, duo in veritus definiebas. Sed modo vocent utroque ad, nam mazim evertitur at. Usu sumo iudicabit at. Est in eripuit accusamus rationibus, ad graeci dignissim definitiones usu. Eum feugiat sadipscing no, ex eos alii dicit. Epicurei comprehensam ut mei, per eruditi perfecto cotidieque ne.</p>
            <hr>
            Juan Dela Cruz
        </div>
    </div>

</div>
</div>

@endsection

@section('Datatable')

    <script>
    $(document).ready(function() {
        $('#feedbacks').DataTable({
            responsive: true,
            "dom": '<"top"f>rt<"bottom"p><"clear">'
        });
    });
    
    </script>

@endsection