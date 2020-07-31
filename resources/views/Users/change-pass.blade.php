@extends('layout')

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-success">パスワード変更</h3>

  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-11">

        <form method="POST" action="{{ route('ChangePassword') }}">
            @csrf
            <div class="form-group row mt-3">
              <label for="old_password" class="col-md-4 col-form-label text-md-right">現在の{{ __('Password') }}</label>

              <div class="col mb-1">
                <input id="old_password" type="password" class="form-control @error('password') is-invalid @enderror"
                 name="old_password" required autocomplete="current-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="new_password" class="col-md-4 col-form-label text-md-right">新しい{{ __('Password') }}</label>

              <div class="col">
                <input id="new_password" type="password" class="form-control @error('password') is-invalid @enderror"
                 name="new_password" required autocomplete="current-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="new_password_conf" class="col-md-4 col-form-label text-md-right">新しい{{ __('Password') }}（確認）</label>

              <div class="col">
                <input id="new_password_conf" type="password" class="form-control @error('password') is-invalid @enderror"
                 name="new_password_conf" required autocomplete="current-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-auto">
                <a class="btn btn-secondary" href="{{ route('EditInfoForm') }}" role="button">
                  戻る</a>
              </div>
              <div class="col-auto">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">変更</button>
                </div>
              </div>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
