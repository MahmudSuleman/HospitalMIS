@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">

                <h3 class="text-center mb-3">Edit Department</h3>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">

                        @include('flash-message')
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('department.update', [$department->id]) }}">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                            <label for="name">Department Name</label>
                            <input type="text" id="name" value="{{old('name') ?? $department->name}}" class="form-control @error('name') is-invalid @enderror" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>

                </div>



            </form>
        </div>
    </div>

@endsection
@include('includes.footer')
