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
            <div class="row">
                <div class="col">
                    @include('flash-message')
                </div>
            </div>
            <table class="table table-striped" id="tbl_user">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('user.edit', [$user])}}"><i class="fa fa-edit"></i> Edit</a>
                            <form  action="{{Route('user.destroy', [$user->id])}}" method="post" style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger inline">Delete</button>
                            </form>                        </td>
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

        //Warning Message
        $('.sa-warning').click(function (e) {
            let todo = false;
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fa7f3',
                cancelButtonColor: '#d57171',
                confirmButtonText: 'Yes, delete it!'
            }).then(function (e) {


                if(e.value === true){
                    $.ajax({
                            'url': "{{route('user.destroy', [$user])}}",
                            method: 'delete'
                        }
                    )
                    // swal(
                    //     'Deleted!',
                    //     'Your data has been deleted.',
                    //     'success'
                    // )
                }



            })

            return todo;
        });
    </script>
@endsection
