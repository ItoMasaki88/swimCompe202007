@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} レース追加・削除</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="mb-5 my-titleborder-orangered">レース追加・削除</h3>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col">

        <div class="card mb-4 my-bg-whitesmoke">

          <div class="card-header">
            <div class="container">
              <div class="row">
                <div class="col-auto py-1 mr-auto">
                  <h5 class="my-subtitleborder-royalblue mb-0">{{ $eventId }}. {{ $eventName }}</h5>
                </div>
                <div class="col-auto">
                  <form action="{{route('DelEvent')}}" method="POST"> @csrf
                    <input type="hidden" name="eventId" value="{{$eventId}}">
                    @if ($event_count == 0)
                    <input class="btn btn-outline-danger" type="submit" value="種目削除">
                    @else
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                     data-target="#e_modal{{$eventId}}">種目削除</button>
                    <div class="modal fade" id="e_modal{{$eventId}}" tabindex="-1"
                         role="dialog" aria-labelledby="label1" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <h5 class="text-danger">この種目にエントリー中の選手がいます！</h5>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                            <input class="btn btn-danger" type="submit" value="削除する">
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="card-body">
            @foreach ($raceRecords as $raceRecord)
            @php $raceId = $raceRecord['raceId']; @endphp
            <div class="container">
              <div class="row">
                <div class="col-auto">
                  <h6 class="my-subtitleborder-skyblue">第{{ $raceRecord['No'] }}レース</h6>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <p class="card-text">開始時間</p>
                </div>
                <div class="col-auto mr-auto">
                  <p class="card-text">{{$raceRecord['startTime']}}</p>
                </div>

                <div class="col-auto">
                  <form action="{{route('DelRace')}}" method="POST"> @csrf
                    <input type="hidden" name="raceId" value="{{$raceId}}">
                    @if ($raceRecord['race_count'] == 0)
                    <input class="btn btn-outline-warning" type="submit" value="レース削除">
                    @else
                    <button type="button" class="btn btn-outline-warning" data-toggle="modal"
                     data-target="#r_modal{{$raceId}}">レース削除</button>
                    <div class="modal fade" id="r_modal{{$raceId}}" tabindex="-1"
                         role="dialog" aria-labelledby="label1" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <h5 class="text-danger">このレースにエントリー中の選手がいます！</h5>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                            <input class="btn btn-danger" type="submit" value="削除する">
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                  </form>
                </div>
              </div>

              @if (!is_null($raceRecord['entryRecords']))
              <div class="container mt-2 mb-4">
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

              <div class="row mb-5">
                <div class="col-2">
                  <p class="card-text">エントリー数</p>
                </div>
                <div class="col-auto mr-auto">
                  <p class="card-text">{{$raceRecord['race_count']}} / {{$raceRecord['lanes']}}</p>
                </div>
              </div>

            </div>
            @endforeach
            <form action="{{route('AddRace')}}" method="POST"> @csrf
              <div class="container">
                <div class="form-group row justify-content-end">
                  <input type="hidden" name="eventId" value="{{$eventId}}">
                  <input type="number" name="races" id="races" required
                    class="col-md-2 col-6 form-control @if($valid) is-invalid @endif @error('races') is-invalid @enderror">
                  <label class="col-auto py-auto col-form-label" for="races">レース</label>
                  <input class="btn btn-primary col-auto" type="submit" value="追加する">

                  @if($valid)
                      <span class="invalid-feedback text-md-right" role="alert">
                          <strong>レース数は最大10までです。</strong>
                      </span>
                  @endif
                  @error('races')
                      <span class="invalid-feedback text-md-right" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
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
