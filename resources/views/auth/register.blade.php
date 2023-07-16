@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm-me" style="background-color: #495057; color: white">
                <div class="card-header"style="text-align: center;font-size: 40px;font-weight: bold;">{{ __('Register') }} <i class="fas fa-user-plus"></i></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-outline mb-4 text-center">
                            <label for="name" class="form-label" style="padding-right: 200px">{{ __('Name') }}</label>

                            <div class="col-md-6 m-auto">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-outline mb-4 text-center">
                            <label for="email" class="form-label" style="padding-right: 200px">{{ __('Email Address') }}</label>

                            <div class="col-md-6 m-auto">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-outline mb-4 text-center">
                            <label for="password" class="form-label" style="padding-right: 200px">{{ __('Password') }}</label>

                            <div class="col-md-6 m-auto">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-outline mb-4 text-center">
                            <label for="password-confirm" class="form-label" style="padding-right: 200px">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6 m-auto">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block mb-4 shadow-sm" style="width: 50%; font-size: 18px">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
