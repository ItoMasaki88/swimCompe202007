@extends('layout')

@section('content')
<h3 class="m-3 my-titleborder-success">選手情報</h3>

<div class="card-body">
  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-11">

        <div class="table-responsive">
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
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($myEntries as $myEntry)
              <tr>
                <td class="text-nowrap">{{$myEntry['eventId']}}</td>
                <td class="text-nowrap">{{$myEntry['eventName']}}</td>
                <td class="text-nowrap">{{$myEntry['raceNo']}}</td>
                <td class="text-nowrap">{{$myEntry['startTime']}}</td>
                <td class="text-nowrap">{{$myEntry['laneNo']}}</td>
                <td class="text-nowrap">{{$myEntry['result']}}</td>
                <td class="text-nowrap">{{$myEntry['rank']}}</td>
                <td class="text-nowrap">
                  <form action="{{ route('Refuse', ['id' => $myEntry['id'],]) }}" method="POST">
                    @csrf
                    <input class="btn btn-danger" type="submit" value="辞退する">
                  </form>
                </td>
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

        <div class="row justify-content-end">
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
