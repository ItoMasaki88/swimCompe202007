@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} スケジュール編集</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="mb-5 my-titleborder-orangered">スケジュール編集</h3>

  @if ($errors->any())
      <div class="alert alert-danger">
        {{ $errors->all()[0] }}
      </div>
  @endif


  <div class="container">
    <div class="row justify-content-center">
      <div class="col">

        <form class="form" action="{{ route('EditSchedule') }}" method="POST">
            @csrf
          @foreach ($eventRecords as $eventRecord)
          <div class="card mb-4 bg-info">

            <div class="card-header">
              <div class="container">
                <div class="row">
                  <div class="col-auto py-1">
                    <h5 class="mb-0">{{ $eventRecord['eventId'] }}. {{ $eventRecord['eventName'] }}</h5>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-body">
              @foreach ($eventRecord['raceRecords'] as $raceRecord)
              @php $raceId = $raceRecord['raceId'] @endphp
              <div class="container">
                <div class="row">
                  <div class="col-auto">
                    <h6 class="border-bottom border-light">第{{ $raceRecord['No'] }}レース</h6>
                  </div>
                </div>

                <div class="form-group row py-1 mt-4">
                  <label class="col-md-2 py-1 col-form-label text-md-right" for="date">開始時間</label>
                  <div class="col-md-9">
                    <div class="container">
                      <div class="row">
                        <input type="hidden" name="raceIds[]" value="{{$raceId}}">
                        <input type="number" id="date{{$raceId}}" value="{{ $raceRecord['date'] }}"
                          class="col-md-2 col-9 py-2 form-control" name="dates[{{$raceId}}]" required>
                        <label class="col-auto py-2 col-form-label" for="date{{$raceId}}">日目</label>
                        <input type="number" id="hour{{$raceId}}" value="{{ $raceRecord['hour'] }}"
                          class="col-md-3 col-9 py-2 form-control" name="hours[{{$raceId}}]" required>
                        <label class="col-auto py-2 col-form-label" for="hour{{$raceId}}">時</label>
                        <input type="number" id="minute{{$raceId}}" value="{{ $raceRecord['min'] }}"
                          class="col-md-3 col-9 py-2 form-control" name="minutes[{{$raceId}}]" required>
                        <label class="col-auto py-2 col-form-label" for="minute{{$raceId}}">分</label>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-5">
                  <div class="col-auto">
                    <p class="card-text">エントリー数</p>
                  </div>
                  <div class="col-auto">
                    <p class="card-text">{{$raceRecord['race_count']}} / {{$raceRecord['lanes']}}</p>
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

          <div class="container-fluid fixed-bottom p-4 my-bg-black-trans">
            <div class="offset-8 col-4 offset-lg-10 col-lg-2">
              <input class="btn btn-primary btn-lg" type="submit" value="送信">
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
