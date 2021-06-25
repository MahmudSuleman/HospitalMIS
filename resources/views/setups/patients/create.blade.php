@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <h3 class="text-center">Add New Patient</h3>
                </div>
            </div>

            <form action="{{route('patient.store')}}" method="post">
                @csrf
                @include('setups.patients.form')
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('change', '#department_id', function (event) {
                let department_id = $(this).val();
                // query to get a doctor belonging to the department selected
                $.get()
            })
        })
    </script>
@endsection
