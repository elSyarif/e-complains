@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card bg-light border-info shadow">
        <div class="card-header"><strong>{{ __('Register') }}</strong></div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row justify-content-center">
              {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

              <div class="col-md-10">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                  name="name" value="{{ old('name') }}" required autofocus placeholder="{{ __('Name') }}">

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row justify-content-center">
              {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
              --}}

              <div class="col-md-10">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                  name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail Address') }}">

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row justify-content-center">
              {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

              <div class="col-md-10">
                <input id="password" type="password"
                  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required
                  placeholder="{{ __('Password') }}">

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row justify-content-center">
              {{-- <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right"></label> --}}

              <div class="col-md-10">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                  placeholder="{{ __('Confirm Password') }}">
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-10 offset-md-1">
                <button type="submit" class="btn btn-primary btn-block">
                  {{ __('Register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
