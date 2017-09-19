@extends('layout.admin')

@section('modals')

    <!-- Modal -->
    <div class="modal fade" id="ViewUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Juan Dela Cruz</h4>
        </div>
        <div class="modal-body">
            <input type="number" class="rating" value="4.3" step=".1" disabled>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

@endsection

@section('body')

    <h1>Active Users</h1>
    <hr>

     <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#frm" role="tab" data-toggle="tab">Farmers</a></li>
        <li role="presentation"><a href="#byr" role="tab" data-toggle="tab">Buyers</a></li>
        <li role="presentation"><a href="#sp" role="tab" data-toggle="tab">System Personnel</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="frm">

            <!-- FARMERS TABLE -->
            <b class="pull-right text-success">The following are the active FARMERS in the system. Click on the name to view more details on his profile</b>
            <table width="100%" class="table table-hover table-bordered" id="farmers">
                <thead>
                    <tr>
                        <th>Name</th>
                        <!-- 
                        <th>User Type</th>
                        <th>Email</th>
                        <th>Contact</th>
                        -->
                        <th>Subscription</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                    <tr class="odd gradeX">
                        <td>
                            <a href="" type="button" data-toggle="modal" data-target="#ViewUserModal">
                                {{$user->fname.' '.$user->middleinitial.' '.$user->lname}}
                            </a>
                        </td>
                        <!-- 
                        <td>{{$user->type}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->contactno}}</td>
                         -->
                        <td>Premium</td>
                        <td>
                            <!-- @Nell sa value mo ilagay ung rating nila -->
                            <input type="number" class="rating" value="4.5" step="0.1" disabled>
                        </td>
                        <td>
                            <form class="form-group" action="{{'/admin/users/'.$user->id}}" method="POST">
                            {{csrf_field()}}
                            <button class="btn btn-danger btn-sm"><span class="fa fa-archive"></span> Deactivate</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- END OF FARMERS TABLE -->

        </div>
        <div role="tabpanel" class="tab-pane fade" id="byr">
        
            <!-- BUYERS TABLE -->
            <b class="pull-right text-success">The following are the active BUYERS in the system. Click on the name to view more details on his profile</b>
            <table width="100%" class="table table-hover table-bordered" id="buyers">
                <thead>
                    <tr>
                        <th>Name</th>
                        <!-- 
                        <th>User Type</th>
                        <th>Email</th>
                        <th>Contact</th>
                        -->
                        <th>Subscription</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                    <tr class="odd gradeX">
                        <td>
                            <a href="" type="button" data-toggle="modal" data-target="#ViewUserModal">
                                {{$user->fname.' '.$user->middleinitial.' '.$user->lname}}
                            </a>
                        </td>
                        <!-- 
                        <td>{{$user->type}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->contactno}}</td>
                         -->
                        <td>Premium</td>
                        <td>
                            <!-- @Nell sa value mo ilagay ung rating nila -->
                            <input type="number" class="rating" value="4.5" step="0.1" disabled>
                        </td>
                        <td>
                            <!-- edit/{id} -->
                            <form class="form-group" action="{{'/admin/users/'.$user->id}}" method="POST">
                            {{csrf_field()}}
                            <button class="btn btn-danger btn-sm"><span class="fa fa-archive"></span> Deactivate</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- END OF BUYERS TABLE -->

        </div>
        <div role="tabpanel" class="tab-pane fade" id="sp">
        
            <!-- SYSTEM PERSONNEL TABLE -->
            <b class="pull-right text-success">The following are the active SYSTEM PERSONNEL in the system. Click on the name to view more details on his profile</b>
            <table width="100%" class="table table-hover table-bordered" id="systempersonnel">
                <thead>
                    <tr>
                        <th>Name</th>
                        <!-- 
                        <th>User Type</th>
                        <th>Email</th>
                        <th>Contact</th>
                        -->
                        <th>Subscription</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                    <tr class="odd gradeX">
                        <td>
                            <a href="" type="button" data-toggle="modal" data-target="#ViewUserModal">
                                {{$user->fname.' '.$user->middleinitial.' '.$user->lname}}
                            </a>
                        </td>
                        <!-- 
                        <td>{{$user->type}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->contactno}}</td>
                         -->
                        <td>Premium</td>
                        <td>
                            <!-- @Nell sa value mo ilagay ung rating nila -->
                            <input type="number" class="rating" value="4.5" step="0.1" disabled>
                        </td>
                        <td>
                            <!-- edit/{id} -->
                            <form class="form-group" action="{{'/admin/users/'.$user->id}}" method="POST">
                            {{csrf_field()}}
                            <button class="btn btn-danger btn-sm"><span class="fa fa-archive"></span> Deactivate</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- END OF SYSTEM PERSONNEL TABLE -->
        
        </div>
    </div>

@endsection

@section('Datatable')

    <script>
    $(document).ready(function() {
        $('#farmers').DataTable({
            responsive: true,
            "dom": '<"top"f>rt<"bottom"p><"clear">'
        });
        $('#buyers').DataTable({
            responsive: true,
            "dom": '<"top"f>rt<"bottom"p><"clear">'
        });
        $('#systempersonnel').DataTable({
            responsive: true,
            "dom": '<"top"f>rt<"bottom"p><"clear">'
        });
    });
    </script>

    <script>
        $(".rating").rating({size:'xs', showClear:false});
    </script>

@endsection