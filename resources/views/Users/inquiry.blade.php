@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} お問い合わせ</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-success">お問い合わせ</h3>

  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-11">

        <form method="POST" action="{{ route('InquirySend') }}">
              @csrf

            <div class="form-group">
              <label for="name">{{ __('Name') }}</label>
              <input id="name" type="text" name="name" required autocomplete="name"
                class="form-control col-md-6 @error('name') is-invalid @enderror"
                value="@if ( old('name') !== null ) {{ old('name') }} @elseif(Auth::check()){{ Auth::user()->name }}@endif">

              @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="email">{{ __('E-Mail Address') }}</label>
              <input id="email" type="email" required autocomplete="email"
                class="form-control col-md-6 @error('email') is-invalid @enderror" name="email"
                value="@if ( old('email') !== null ) {{ old('email') }} @elseif ( Auth::check() ) {{ Auth::user()->email }} @endif">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group h-50">
              <label for="textarea">お問い合わせ内容</label>
              <textarea id="textarea" name="content" rows="10" required
                class="form-control @error('content') is-invalid @enderror"></textarea>

              @error('content')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="row justify-content-end">
              <div class="col-auto">
                <div class="form-group">
                  <button type="submit" id="withdraw" class="btn btn-primary">送信</button>
                </div>
              </div>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
