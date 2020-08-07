@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} 選手情報詳細</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="mb-5 my-titleborder-orangered">選手情報詳細</h3>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-11">

        <h5 class="card-title"><span class="border-bottom border-info">選手基本情報</span></h5>
        <div class="table-responsive mb-5">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">氏名</th>
                <td>{{ $player->name }}</td>
              </tr>
              <tr>
                <th scope="row">生年月日・年齢</th>
                <td>{{ $player->age }}</td>
              </tr>
              <tr>
                <th scope="row">出場可能種目</th>
                <td>{{ $player->name }}</td>
              </tr>
              <tr>
                <th scope="row">性別</th>
                <td>{{ $player->text_sex }}</td>
              </tr>
              <tr>
                <th scope="row">メールアドレス</th>
                <td>{{ $player->email }}</td>
              </tr>
              <tr>
                <th scope="row">エントリー種目数</th>
                <td>{{ count($player->entries) }}</td>
              </tr>
            </tbody>
          </table>
        </div>

        <h5 class="card-title"><span class="border-bottom border-info">エントリー情報</span></h5>
        <div class="table-responsive mb-5">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="text-nowrap">種目ID</th>
                <th class="text-nowrap">種目名</th>
                <th class="text-nowrap">レース番号</th>
                <th class="text-nowrap">開始時間</th>
                <th class="text-nowrap">レーン番号</th>
                <th class="text-nowrap">記録</th>
                <th class="text-nowrap">順位</th>
              </tr>
            </thead>
            <tbody>
              @foreach($playerEntries as $playerEntrie)
              <tr>
                <td class="text-nowrap">{{$playerEntrie['eventId']}}</td>
                <td class="text-nowrap">{{$playerEntrie['eventName']}}</td>
                <td class="text-nowrap">{{$playerEntrie['raceNo']}}</td>
                <td class="text-nowrap">{{$playerEntrie['startTime']}}</td>
                <td class="text-nowrap">{{$playerEntrie['laneNo']}}</td>
                <td class="text-nowrap">{{$playerEntrie['result']}}</td>
                <td class="text-nowrap">{{$playerEntrie['rank']}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @if ($count == 0)
          <div class="cintainer mt-2 mb-5">
            <h4 class="text-secondary text-center">エントリー中の種目がありません</h4>
          </div>
          @endif
        </div>

        <div class="row justify-content-end mb-3">
          <div class="col-auto">
            <a class="btn btn-secondary" href="{{ route('PlayersList') }}" role="button">
              戻る</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
