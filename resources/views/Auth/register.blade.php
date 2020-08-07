@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} {{ __('Register') }}</title>
@endsection

@section('content')
<div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="birth" class="col-md-3 col-form-label text-md-right">生年月日</label>

            <div class="col-md-9">
                <div class="container">
                    <div class="row">
                        <select class="form-control col-md-3 @error('year') is-invalid @enderror"
                         id="select_year" required name="year"></select>
                        <label for="select_year" class="col-auto col-form-label">年</label>
                        <select class="form-control col-md-2 @error('month') is-invalid @enderror"
                         id="select_month" required name="month"></select>
                        <label for="select_month" class="col-auto col-form-label">月</label>
                        <select class="form-control col-md-2 @error('day') is-invalid @enderror"
                         id="select_day" required name="day"></select>
                        <label for="select_day" class="col-auto col-form-label">日</label>

                        @if (null !== $errors->get('year') || null !== $errors->get('month') || null !== $errors->get('day'))
                            <span class="invalid-feedback" role="alert">
                              <strong>生年月日を選択してください</strong>
                            </span>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <div class="form-group row">
            <label for="sex" class="col-md-3 col-form-label text-md-right">性別</label>

            <div class="col-md-6">
                <div class="custom-control custom-radio custom-control-inline @error('sex') is-invalid @enderror">
                  <input class="custom-control-input col-auto my-2 @error('sex') is-invalid @enderror"
                    type="radio" value="1" id="male" required name="sex">
                  <label class="custom-control-label col-auto my-2" for="male">男子</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline @error('sex') is-invalid @enderror">
                  <input class="custom-control-input col-auto my-2 @error('sex') is-invalid @enderror"
                    type="radio" value="0" id="female" required name="sex">
                  <label class="custom-control-label col-auto my-2" for="female">女性</label>
                </div>

                @error('sex')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

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
            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-9">
                <div class="container">
                    <div class="row justify-content-end">
                      <div class="col-aout">
                        <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection


@section('scripts')
<script src="{{ asset('js/register.js') }}"></script>
@endsection
