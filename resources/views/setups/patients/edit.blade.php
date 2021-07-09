@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    @include('flash-message')
                </div>
            </div>
            <form action="{{route('patient.update', $patient)}}" method="post">
                @csrf
                @method('put')
                @include('setups.patients.form')
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){

        })
    </script>
@endsection
