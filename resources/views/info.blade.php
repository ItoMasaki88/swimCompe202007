@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} 大会情報</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-navy">大会情報</h3>

  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-12">

        <h3>○○市水泳大会</h3>

        <div class="col-12 my-3">
          <img src="{{ asset('/img/map.png') }}" alt="map" class="" width=100%>
        </div>

        <table class="table">
          <tbody>
            <tr>
              <th scope="row">開催期間</th>
              <td>{{ config('const.HOLDING_PERIOD') }}</td>
            </tr>
            <tr>
              <th scope="row">主催者</th>
              <td>{{ config('const.HOST') }}</td>
            </tr>
            <tr>
              <th scope="row">開催場所</th>
              <td>{{ config('const.LOCATION') }}</td>
            </tr>
            <tr>
              <th scope="row">開催場所（住所）</th>
              <td>{{ config('const.ADDRESS') }}</td>
            </tr>
            <tr>
              <th scope="row">エントリー期限</th>
              <td>{{ config('const.ENTRY_PERIOD') }}</td>
            </tr>
            <tr>
              <th scope="row">出場費</th>
              <td>{{ config('const.ENTRY_FEE') }}</td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
@endsection
