@extends('layout')

@section('content')
<div class="card-body">
  <h3 class="mb-5 my-titleborder-orangered">種目・レース削除</h3>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col">

        @foreach ($eventRecords as $eventRecord)
        @php $eventId = $eventRecord['eventId']; @endphp
        <div class="card mb-4 text-white bg-secondary">

          <div class="card-header">
            <div class="container">
              <div class="row">
                <div class="col-auto py-1 mr-auto">
                  <h5 class="mb-0">{{ $eventId }}. {{ $eventRecord['eventName'] }}</h5>
                </div>
                <div class="col-auto">
                  <form action="{{route('DelEvent')}}" method="POST"> @csrf
                    <input type="hidden" name="eventId" value="{{$eventId}}">
                    @if ($eventRecord['event_count'] == 0)
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
            @foreach ($eventRecord['raceRecords'] as $raceRecord)
            @php $raceId = $raceRecord['raceId']; @endphp
            <div class="container">
              <div class="row">
                <div class="col-auto">
                  <h6 class="border-bottom border-light">第{{ $raceRecord['No'] }}レース</h6>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <p class="card-text">開始時間</p>
                </div>
                <div class="col-auto">
                  <p class="card-text">{{$raceRecord['startTime']}}</p>
                </div>
              </div>

              <div class="row mb-5">
                <div class="col-2">
                  <p class="card-text">エントリー数</p>
                </div>
                <div class="col-auto mr-auto">
                  <p class="card-text">{{$raceRecord['race_count']}} / {{$raceRecord['lanes']}}</p>
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
                            <input class="btn btn-warning" type="submit" value="削除する">
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                  </form>
                </div>
              </div>
            </div>
            @endforeach
          </div>

        </div>
        @endforeach

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
