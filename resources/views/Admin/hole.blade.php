@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} レース全体情報</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="mb-4 my-titleborder-orangered">レース全体情報</h3>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col">

        <div class="row justify-content-end mb-3">
          <div class="col-auto">
            <a class="btn btn-outline-info btn-lg" href="{{ route('ScheduleForm') }}" role="button">
              スケジュール編集</a>
          </div>
        </div>
        @foreach ($eventRecords as $eventRecord)
        <div class="card my-bg-whitesmoke mb-4">

          <div class="card-header">
            <div class="container">
              <div class="row">
                <div class="col-auto py-1 mr-auto">
                  <h4 class="my-subtitleborder-royalblue mb-0">
                    {{ $eventRecord['eventId'] }}. {{ $eventRecord['eventName'] }}</h4>
                </div>
                <div class="col-auto">
                  <a href="{{ route('ResultForm', ['event' => $eventRecord['eventId'],]) }}"
                    role="button" class="btn btn-warning">結果入力</a>
                </div>
                <div class="col-auto">
                  <a href="{{ route('RacesAddDelForm', ['event' => $eventRecord['eventId'],]) }}"
                    role="button" class="btn btn-danger">レース追加・削除</a>
                </div>
              </div>
            </div>
          </div>

          <div class="card-body">
            @foreach ($eventRecord['raceRecords'] as $raceRecord)
            <div class="container">

              <div class="row">
                <div class="col-auto">
                  <h5 class="my-subtitleborder-skyblue">第{{ $raceRecord['No'] }}レース</h5>
                </div>
                <div class="col-auto">
                  <p>{{$raceRecord['startTime']}}-</p>
                </div>
              </div>

              @if (!is_null($raceRecord['entryRecords']))
              <div class="container mb-4">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="text-nowrap">レーン</th>
                        <th scope="col" class="text-nowrap">氏名</th>
                        <th scope="col" class="text-nowrap">年齢</th>
                        <th scope="col" class="text-nowrap">記録</th>
                        <th scope="col" class="text-nowrap">順位</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($raceRecord['entryRecords'] as $entryRecord)
                      <tr>
                        <td class="text-nowrap">{{$entryRecord['laneNo']}}</td>
                        <td class="text-nowrap">{{$entryRecord['playerName']}}</td>
                        <td class="text-nowrap">{{$entryRecord['age']}}</td>
                        <td class="text-nowrap">{{$entryRecord['result']}}</td>
                        <td class="text-nowrap">{{$entryRecord['rank']}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              @endif
            </div>
            @endforeach
          </div>

        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection
