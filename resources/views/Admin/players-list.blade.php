@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} 選手一覧</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="my-titleborder-orangered">選手一覧</h3>

  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col">

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="text-nowrap">ID</th>
                <th class="text-nowrap">氏名</th>
                <th class="text-nowrap">性別</th>
                <th class="text-nowrap">年齢</th>
                <th class="text-nowrap">メールアドレス</th>
                <th class="text-nowrap"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($players as $player)
              <tr>
                <td class="text-nowrap">{{$player->id}}</td>
                <td class="text-nowrap">{{$player->name}}</td>
                <td class="text-nowrap">{{$player->text_sex}}</td>
                <td class="text-nowrap">{{$player->age}}</td>
                <td class="text-nowrap">{{$player->email}}</td>
                <td class="text-nowrap">
                  <form action="{{ route('PlayerInfo', [
                    'player_id' => $player->id,
                    ]) }}" method="POST">
                      @csrf
                    <input class="btn btn-success" type="submit" value="詳細">
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
