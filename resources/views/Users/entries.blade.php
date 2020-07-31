@extends('layout')

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-success">エントリー一覧</h3>

  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col">

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
            <h4 class="text-danger text-center">エントリー中の種目がありません</h4>
            <p class="text-center mt-3"> <a href="{{ route('Events') }}">種目一覧へ</a></p>
          </div>
          @endif
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
