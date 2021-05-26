@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="card-title pull-left">
                        <h3>Users List</h3>
                    </div>
                </div>
                <div class="col">
                    <a href="{{route('user.create')}}" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Add User</a>

                </div>


            </div>
            <hr>
            <table class="table table-striped" id="tbl_user">
                <thead>
                <tr>
                    <th hidden></th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td hidden>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>
                            <a class="btn btn-warning" href="#"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var user_table = $('#tbl_user').DataTable({
            responsive: true,
            'columnDefs': [{
                'targets': [-1],
                'orderable': false
            }]
        })

        $('#tbl_user tbody').on('click', 'tr', function (e) {
            var data = user_table.row(this).data();
            console.log(data);
        })
    </script>
@endsection
