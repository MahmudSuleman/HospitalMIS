@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <h3 class="text-center">Add New Employee</h3>
                </div>
            </div>

            <form action="{{route('employee.store')}}" method="post">
                @csrf
                @include('setups.employees.form')
            </form>

        </div>
    </div>
@endsection
