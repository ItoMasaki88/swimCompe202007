@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} 選手情報の編集</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-success">選手情報の編集</h3>

  <div class="container py-2">
    <div class="row justify-content-center">
      <div class="col-11">

        @php
          $user = Auth::user();
        @endphp
        <form action="{{ route('EditInformation') }}" method="post">
          @csrf

          <table class="table">
            <tbody>
              <tr>
                <th scope="row"> <label for="name">氏名</label></th>
                <td>
                  <div class="form-group">
                    <input type="text" value="{{ $user->name }}" class="form-control" id="name" disabled />
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row"> <label for="age">生年月日・年齢</label></th>
                <td>
                  <div class="form-group">
                    <input type="text" value="{{ $user->age }}" class="form-control" id="age" disabled />
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row"> <label for="entriable">出場可能種目</label></th>
                <td>
                  <div class="form-group">
                    <input type="text" value="{{ $user->age }}" class="form-control" id="entriable" disabled />
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row"> <label for="sex">性別</label></th>
                <td>
                  <div class="form-group">
                    <input type="text" value="{{ $user->text_sex }}" class="form-control" id="sex" disabled />
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row"> <label for="email">{{ __('E-Mail Address') }}</label></th>
                <td>
                  <div class="form-group">
                    <input type="emal" value="{{ $user->email }}" id="email" name="email"
                      class="form-control @error('email') is-invalid @enderror" required/>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="container">
            <div class="form-group row justify-content-end">
              <div class="col-md-8">
                <label for="password" class="col-form-label">確認のため{{ __('Password') }}を入力してください。</label>
                <input id="password" type="password" autocomplete="current-password" required
                  name="password" class="form-control @error('password') is-invalid @enderror">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="row justify-content-end">
                  <div class="col-auto mt-1">
                    <a href="{{ route('ChangePassForm') }}" role="button">{{ __('Password') }}変更</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row justify-content-end">
              <div class="col-auto">
                <a class="btn btn-secondary" href="{{ route('Mypage') }}" role="button">
                  戻る</a>
              </div>
              <div class="col-auto">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">編集</button>
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
