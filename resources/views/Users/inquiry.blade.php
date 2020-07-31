@extends('layout')

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-success">お問い合わせ</h3>

  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-11">

        <form method="POST" action="{{ route('InquirySend') }}">
              @csrf

            <div class="form-group">
              <label for="email">{{ __('E-Mail Address') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group h-50">
              <label for="textarea">お問い合わせ内容</label>
              <textarea id="textarea" class="form-control" name="content" rows="10"></textarea>
              @error('password')
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
