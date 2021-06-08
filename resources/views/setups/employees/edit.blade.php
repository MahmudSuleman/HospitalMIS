@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <h3 class="text-center">Edit Employee Details</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    @include('flash-message')
                </div>
            </div>

            <form action="{{route('employee.update', [$employee])}}" method="post">
                @csrf
                @method('put')
                @include('setups.employees.form')
            </form>

        </div>
    </div>
@endsection
