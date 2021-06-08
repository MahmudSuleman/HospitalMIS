@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="card-title pull-left">
                        <h3>Employees List</h3>
                    </div>
                </div>
                <div class="col">
                    <a href="{{route('employee.create')}}" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Add Employee</a>

                </div>


            </div>
            <hr>
            <div class="row">
                <div class="col">
                    @include('flash-message')
                </div>
            </div>
            <table class="table table-striped responsive" width="100%" id="tbl_user">
                <thead>
                <tr>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Department</th>
                    <th>D.O.B</th>
                    <th>Type</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->first_name}}</td>
                        <td>{{$employee->last_name}}</td>
                        <td>{{$employee->department->name}}</td>
                        <td>{{$employee->date_of_birth}}</td>
                        <td>{{$employee->employee_type->name}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('employee.edit', [$employee])}}"><i class="fa fa-edit"></i> Edit</a>
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
