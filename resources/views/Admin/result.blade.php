@extends('layout')

@section('content')
<div class="card-body">
  <h3 class="mb-5 my-titleborder-orangered">結果入力</h3>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col">

        <div class="card my-bg-whitesmoke mb-4">

          <div class="card-header">
            <div class="container">
              <div class="row">
                <div class="col-auto py-1">
                  <h4 class="my-subtitleborder-royalblue mb-0">
                    {{ $eventRecord['eventId'] }}. {{ $eventRecord['eventName'] }}</h4>
                </div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <form class="form" action="{{ route('InsertResult') }}" method="POST">
              @csrf
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
                        @php $entryId = $entryRecord['entryId']; @endphp
                        <input type="hidden" name="entryIds[]" value="{{$entryId}}">
                        <tr>
                          <td class="text-nowrap">{{$entryRecord['laneNo']}}</td>
                          <td class="text-nowrap">{{$entryRecord['playerName']}}</td>
                          <td class="text-nowrap">{{$entryRecord['age']}}</td>
                          <td class="text-nowrap">
                            <div class="form-group row py-1">
                              <input value="{{$entryRecord['min']}}" type="number" class="col-3 py-2 form-control"
                                  id="min{{$entryId}}" name="mins[]">
                              <label class="col-auto py-2" for="min{{$entryId}}">分</label>
                              <input value="{{$entryRecord['sec']}}" type="number" class="col-3 py-2 form-control"
                                  id="sec{{$entryId}}" name="secs[]" step="0.01">
                              <label class="col-auto py-2" for="sec{{$entryId}}">秒</label>
                            </div>
                          </td>
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
              <div class="row justify-content-end">
                <div class="col-auto">
                  <input class="btn btn-primary" type="submit" value="結果入力">
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="row justify-content-end">
          <div class="col-auto">
            <a class="btn btn-secondary" href="{{ route('Hole') }}" role="button">
              戻る</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
