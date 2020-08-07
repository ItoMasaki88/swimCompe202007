@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} 選手情報</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-success">選手情報</h3>

  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-11">

        @php
          $user = Auth::user();
        @endphp

        <table class="table">
          <tbody>
            <tr>
              <th scope="row">氏名</th>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <th scope="row">生年月日・年齢</th>
              <td>{{ $user->age }}</td>
            </tr>
            <tr>
              <th scope="row">出場可能種目</th>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <th scope="row">性別</th>
              <td>{{ $user->text_sex }}</td>
            </tr>
            <tr>
              <th scope="row">メールアドレス</th>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <th scope="row">エントリー種目数</th>
              <td>
                <div class="row justify-content-between">
                  <div class="col-auto">
                    {{ count($user->entries) }}
                  </div>
                  <div class="col-auto">
                    <a href="{{ route('Entries') }}">エントリー一覧へ</a>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>

        <div class="row justify-content-end">
          <div class="col-auto">
            <a class="btn btn-info text-white" href="{{ route('EditInfoForm') }}" role="button">
              選手情報編集</a>
          </div>
          <div class="col-auto">
            <a class="btn btn-danger" href="{{ route('WithdrawForm') }}" role="button">
              退会</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
