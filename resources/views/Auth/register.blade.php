@extends('layout')

@section('content')
<div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="birth" class="col-md-4 col-form-label text-md-right">生年月日</label>

            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <select class="form-control col-md-3" id="select_year" name="year"></select>
                        <label for="year" class="col-auto col-form-label text-md-right">年</label>
                        <select class="form-control col-md-2" id="select_month" name="month"></select>
                        <label for="month" class="col-auto col-form-label text-md-right">月</label>
                        <select class="form-control col-md-2" id="select_day" name="day"></select>
                        <label for="day" class="col-auto col-form-label text-md-right">日</label>
                    </div>
                </div>
                @error('year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="sex" class="col-md-4 col-form-label text-md-right">性別</label>

            <div class="col-md-6">
                <div class="form-check form-check-inline">
                  <input type="radio" value="1" class="custom-check-input col-auto my-0" id="male" name="sex">
                  <label class="custom-check-label col-auto my-0" for="male">男子</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" value="0" class="custom-check-input col-auto my-0" id="female" name="sex">
                  <label class="custom-check-label col-auto my-0" for="female">女性</label>
                </div>

                @error('sex')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection


@section('scripts')
<script src="{{ asset('js/register.js') }}"></script>
@endsection
