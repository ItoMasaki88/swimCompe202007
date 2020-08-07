@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} パスワード変更</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-success">パスワード変更</h3>

  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-12">

        <form method="POST" action="{{ route('ChangePassword') }}">
            @csrf

            <div class="form-group row pb-4 border-bottom">
              <label for="old_password" class="col-md-5 col-form-label text-md-right">現在の{{ __('Password') }}</label>
              <div class="col-md-6">
                <input id="old_password" type="password" name="old_password"
                class="form-control @error('old_password') is-invalid @enderror" required>

                @error('old_password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row pt-2">
              <label for="new_password" class="col-md-5 col-form-label text-md-right">新しい{{ __('Password') }}</label>
              <div class="col-md-6">
                <input id="new_password" type="password" name="new_password"
                class="form-control @error('new_password') is-invalid @enderror" required>

                @error('new_password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="new_password_confirm" class="col-md-5 col-form-label text-md-right">新しい{{ __('Password') }}（確認）</label>
              <div class="col-md-6">
                <input id="new_password_confirm" type="password" name="new_password_confirm"
                  class="form-control @error('new_password') is-invalid @enderror" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-11">
                <div class="row justify-content-end">
                  <div class="col-auto">
                    <a class="btn btn-secondary" href="{{ route('EditInfoForm') }}" role="button">戻る</a>
                  </div>
                  <div class="col-auto">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">変更</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
