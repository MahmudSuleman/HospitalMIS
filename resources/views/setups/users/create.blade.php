@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">

                <h3 class="text-center mb-3">User Register</h3>
            </div>
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>


                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                            <label for="role_id">{{ __('Role') }}</label>


                            <select id="role_id" type="text" class="form-control @error('role_id') is-invalid @enderror"
                                   name="role_id" required>
                                {!! App\Services\SelectOptions::UserRoles() !!}
                            </select>

                            @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation"
                                   required autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
@include('includes.footer')
