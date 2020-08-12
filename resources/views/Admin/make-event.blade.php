@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} 種目登録</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="mb-4 my-titleborder-orangered">種目登録</h3>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">

        @if(isset($duplicate))
            <div class="alert alert-danger">
                入力した種目は既に存在します。
            </div>
        @endif

        <form action="{{ route('MakeEventDo') }}" method="post">
          @csrf

          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right" for="style">泳法</label>
            <div class="col-md-7">
              <select class="form-control @error('style') is-invalid @enderror" id="style" name="style" required>
                <option value="0" {{old('style')=="0" ? 'selected' : ''}}>選択してください</option>
                <option value="1" {{old('style')=="1" ? 'selected' : ''}}>自由形</option>
                <option value="2" {{old('style')=="2" ? 'selected' : ''}}>平泳ぎ</option>
                <option value="3" {{old('style')=="3" ? 'selected' : ''}}>背泳ぎ</option>
                <option value="4" {{old('style')=="4" ? 'selected' : ''}}>バタフライ</option>
                <option value="5" {{old('style')=="5" ? 'selected' : ''}}>メドレー</option>
              </select>

              @error('style')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right" for="age">年齢区分</label>
            <div class="col-md-7">
              <select class="form-control @error('age') is-invalid @enderror" id="age" name="age" required>
                <option value="0" {{old('age')=="0" ? 'selected' : ''}}>選択してください</option>
                <option value="1" {{old('age')=="1" ? 'selected' : ''}}>小学生</option>
                <option value="2" {{old('age')=="2" ? 'selected' : ''}}>中学生</option>
                <option value="3" {{old('age')=="3" ? 'selected' : ''}}>高校生</option>
                <option value="4" {{old('age')=="4" ? 'selected' : ''}}>成人</option>
                <option value="5" {{old('age')=="5" ? 'selected' : ''}}>ミドル</option>
                <option value="6" {{old('age')=="6" ? 'selected' : ''}}>マスター</option>
              </select>

              @error('age')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right" for="distance">距離</label>
            <div class="col-md-7">
              <select class="form-control @error('distance') is-invalid @enderror" id="distance" name="distance" required>
                <option value="0" {{old('distance')=="0" ? 'selected' : ''}}>選択してください</option>
                <option value="1" {{old('distance')=="1" ? 'selected' : ''}}>50m</option>
                <option value="2" {{old('distance')=="2" ? 'selected' : ''}}>100m</option>
                <option value="3" {{old('distance')=="3" ? 'selected' : ''}}>200m</option>
              </select>

              @error('distance')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
              <label for="sex" class="col-md-3 col-form-label text-md-right">性別</label>

              <div class="col-md-6">
                  <div class="custom-control custom-radio custom-control-inline @error('sex') is-invalid @enderror">
                    <input class="custom-control-input col-auto my-2 @error('sex') is-invalid @enderror"
                      type="radio" value="1" id="male" required name="sex" {{old('sex')=="1" ? 'checked' : ''}}>
                    <label class="custom-control-label col-auto my-2" for="male">男子</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline @error('sex') is-invalid @enderror">
                    <input class="custom-control-input col-auto my-2 @error('sex') is-invalid @enderror"
                      type="radio" value="2" id="female" required name="sex" {{old('sex')=="2" ? 'checked' : ''}}>
                    <label class="custom-control-label col-auto my-2" for="female">女性</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline @error('sex') is-invalid @enderror">
                    <input class="custom-control-input col-auto my-2 @error('sex') is-invalid @enderror"
                      type="radio" value="3" id="mix" required name="sex" {{old('sex')=="3" ? 'checked' : ''}}>
                    <label class="custom-control-label col-auto my-2" for="mix">混合</label>
                  </div>

                  @error('sex')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="playerType" class="col-md-3 col-form-label text-md-right">出場形態</label>

              <div class="col-md-6">
                  <div class="custom-control custom-radio custom-control-inline @error('playerType') is-invalid @enderror">
                    <input class="custom-control-input col-auto my-2 @error('playerType') is-invalid @enderror"
                      type="radio" value="1" id="individual" required name="playerType" {{old('playerType')=="1" ? 'checked' : ''}}>
                    <label class="custom-control-label col-auto my-2" for="individual">個人</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline @error('playerType') is-invalid @enderror">
                    <input class="custom-control-input col-auto my-2 @error('playerType') is-invalid @enderror"
                      type="radio" value="0" id="team" required name="playerType" {{old('playerType')=="0" ? 'checked' : ''}}>
                    <label class="custom-control-label col-auto my-2" for="team">団体</label>
                  </div>

                  @error('playerType')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="races" class="col-md-3 col-form-label text-md-right">レース数</label>

              <div class="col-md-7">
                  <input id="races" type="number" class="form-control @error('races') is-invalid @enderror"
                    name="races" value="{{ old('races') }}" required autocomplete="races" autofocus>

                  @error('races')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row py-1 mt-4">
            <label class="col-md-3 py-1 col-form-label text-md-right" for="date">開始時間</label>
            <div class="col-md-9">
              <div class="container">
                <div class="row">
                  <input type="number" id="date" name="date" value="{{ old('date') }}" required
                    class="col-md-2 py-2 form-control @error('date') is-invalid @enderror">
                  <label class="col-auto py-2 col-form-label" for="date">日目</label>
                  <input type="number" id="hour" name="hour" value="{{ old('hour') }}" required
                    class="col-md-3 py-2 form-control @error('hour') is-invalid @enderror">
                  <label class="col-auto py-2 col-form-label" for="hour">時</label>
                  <input type="number" id="minute" name="minute" value="{{ old('minute') }}" required
                    class="col-md-3 py-2 form-control @error('minute') is-invalid @enderror">
                  <label class="col-auto py-2 col-form-label" for="minute">分</label>

                  @error('date')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  @error('hour')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  @error('minute')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
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
