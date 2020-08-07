@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} 退会申請</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-success">退会申請</h3>

  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-11">

        <p class="text-danger card-text">
          ※退会をすると登録されたエントリー情報などが削除されます。 <br>
          ※大会後の情報の復旧などについては対応しかねます。　
        </p>

        <form method="POST" action="{{ route('Withdrawal') }}">
              @csrf
            <div class="form-group mt-3">
              <label for="textarea">ご意見等ございましたら以下にお書きください。</label>
              <textarea id="textarea" class="form-control" rows="5" name="content"></textarea>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="check">
              <label class="form-check-label" for="check">退会の注意について確認しましたか？</label>
            </div>

            <div class="row justify-content-end">
              <div class="col-auto">
                <a class="btn btn-secondary" href="{{ route('Mypage') }}" role="button">
                  戻る</a>
              </div>
              <div class="col-auto">
                <div class="form-group">
                  <button type="submit" id="withdraw" class="btn btn-danger" disabled>退会</button>
                </div>
              </div>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/withdraw.js') }}"></script>
@endsection
