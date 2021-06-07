@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="card-title pull-left">
                        <h3>Departments List</h3>
                    </div>
                </div>
                <div class="col">
                    <a href="{{route('department.create')}}" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Add Department</a>

                </div>


            </div>
            <hr>
            <table class="table table-striped" id="tbl_user">
                <thead>
                <tr>
                    <th>Department Name</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                    <tr>
                        <td>{{$department->name}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('department.edit', [$department])}}"><i class="fa fa-edit"></i> Edit</a>
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
        let user_table = $('#tbl_user').DataTable({
            responsive: true,
            'columnDefs': [{
                'targets': [-1],
                'orderable': false
            }]
        })
    </script>
@endsection
