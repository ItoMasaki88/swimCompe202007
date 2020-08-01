@extends('layout')

@section('content')
<div class="card-body">
  <h3 class="mb-4 my-titleborder-orangered">種目登録</h3>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10">

        <form action="{{ route('MakeEventDo') }}" method="post">
          @csrf

          <div class="form-group row">
            <label class="col-3" for="style">泳法</label>
            <div class="col-7">
              <select class="form-control" id="style" name="style">
                <option selected>選択してください</option>
                <option value="1">自由形</option>
                <option value="2">平泳ぎ</option>
                <option value="3">背泳ぎ</option>
                <option value="4">バタフライ</option>
                <option value="5">メドレー</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-3" for="age">年齢区分</label>
            <div class="col-7">
              <select class="form-control" id="age" name="age">
                <option selected>選択してください</option>
                <option value="1">小学生</option>
                <option value="2">中学生</option>
                <option value="3">高校生</option>
                <option value="4">成人</option>
                <option value="5">ミドル</option>
                <option value="6">マスター</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-3" for="distance">距離</label>
            <div class="col-7">
              <select class="form-control" id="distance" name="distance">
                <option selected>選択してください</option>
                <option value="1">50m</option>
                <option value="2">100m</option>
                <option value="3">200m</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-3" for="sex">性別</label>
            <div class="col-7">
              <select class="form-control" id="sex" name="sex">
                <option selected>選択してください</option>
                <option value="1">男子</option>
                <option value="2">女子</option>
                <option value="3">混合</option>
              </select>
            </div>
          </div>

          <div class="form-group row pb-3 pt-1">
            <label class="col-md-3 my-0" class="control-label">出場形態</label>
            <div class="col-md-7">
              <div class="form-check form-check-inline">
                <input type="radio" value="True" class="custom-check-input col-auto my-0" id="individual" name="entryType">
                <label class="custom-check-label col-auto my-0" for="individual">個人</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="radio" value="False" class="custom-check-input col-auto my-0" id="team" name="entryType">
                <label class="custom-check-label col-auto my-0" for="team">団体</label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-3" for="races">レース数</label>
            <div class="col-7">
              <input type="number" class="form-control" id="races" name="races">
            </div>
          </div>

          <div class="form-group row py-1 mt-4">
            <label class="col-2 py-1" for="date">開始時間</label>
            <input type="number" class="col-2 py-2 form-control" id="date" name="date">
            <label class="col-auto py-2" for="date">日目</label>
            <input type="number" class="col-2 py-2 form-control" id="hour" name="hour">
            <label class="col-auto py-2" for="hour">時</label>
            <input type="number" class="col-2 py-2 form-control" id="minute" name="minute">
            <label class="col-auto py-2" for="minute">分</label>
          </div>

          <div class="form-group row justify-content-end">
            <div class="col-auto mt-1">
              <button type="submit" class="btn btn-primary">登録</button>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
@endsection
