@extends('layouts.app')

@section('content')

<div class="container ">
  <div class="row justify-content-center my-4">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Login Through API') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login-action') }}" id="form-login">
            @csrf

            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('UserName') }}</label>

              <div class="col-md-6">
                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>
                <span id="username_err">
                  @error('username')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </span>
              </div>
            </div>
            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control " name="password" autocomplete="current-password">

                <span id="password_err">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </span>
              </div>
            </div>
            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary login">
                  {{ __('Login') }}
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
@push('scripts')
<script type="module" src="{{ asset('js/login_api.js') }}"></script>
@endpush