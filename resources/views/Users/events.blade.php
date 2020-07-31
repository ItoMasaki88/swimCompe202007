@extends('layout')

@section('content')
<div class="card-body">
  <h3 class="mb-3 my-titleborder-success">種目一覧</h3>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col">

        <div class="row my-2"><h5>絞り込み検索</h5></div>
        <form>
          <div class="row">
            <div class="col-auto">
              <div class="form-group">
                <label for="style">泳法</label>
                <select class="form-control form-control-sm" id="style">
                  <option value="99">指定なし</option>
                  <option value="1">自由形</option>
                  <option value="2">平泳ぎ</option>
                  <option value="3">背泳ぎ</option>
                  <option value="4">バタフライ</option>
                  <option value="5">メドレー</option>
                </select>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label for="sex">性別</label>
                <select class="form-control form-control-sm" id="sex">
                  <option value="99">指定なし</option>
                  <option value="1">男子</option>
                  <option value="2">女子</option>
                </select>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label for="age">年齢区分</label>
                <select class="form-control form-control-sm" id="age">
                  <option value="99">指定なし</option>
                  <option value="1">小学生（6~12才）</option>
                  <option value="2">中学生（13~15才）</option>
                  <option value="3">高校生（16~18才）</option>
                  <option value="4">成人（19才~）</option>
                  <option value="5">ミドル（30才~）</option>
                  <option value="6">マスター（50才~）</option>
                </select>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label for="dist">距離</label>
                <select class="form-control form-control-sm" id="dist">
                  <option value="99">指定なし</option>
                  <option value="1">50m</option>
                  <option value="2">100m</option>
                  <option value="3">200m</option>
                </select>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label for="player_type">出場形態</label>
                <select class="form-control form-control-sm" id="player_type">
                  <option value="99">指定なし</option>
                  <option value="1">個人</option>
                  <option value="0">団体</option>
                </select>
              </div>
            </div>
            <div class="col-auto">
              <button type="button" class="btn btn-secondary text-white mt-2">リセット</button>
            </div>
            @auth
            <div class="col-auto">
              <div class="border border-secondary rounded p-1 my-3" id='boxOfCheck'>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="entriable">
                  <label class="custom-control-label" for="entriable">参加可能種目</label>
                </div>
              </div>
            </div>
            @endauth
          </div>
        </form>

        @auth
        <form action="{{ route('MakeEntry') }}" method="POST">
          @csrf
        @endauth
          <div class="table-responsive mb-5 mt-3">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="text-nowrap">種目ID</th>
                  <th class="text-nowrap">種目名</th>
                  <th class="text-nowrap">性別</th>
                  <th class="text-nowrap">年齢区分</th>
                  <th class="text-nowrap">出場形態</th>
                  <th class="text-nowrap">参加状況</th>
                  @auth
                  <th class="text-nowrap"></th>
                  @endauth
                </tr>
              </thead>
              <tbody>
                @foreach($eventsAndStatuses as $eventAndStatus)
                <tr data-style="{{$eventAndStatus['event']->int_style}}"
                   data-sex="{{$eventAndStatus['event']->int_sex}}"
                   data-age="{{$eventAndStatus['event']->int_age}}"
                   data-dist="{{$eventAndStatus['event']->int_dist}}"
                   data-player_type="{{$eventAndStatus['event']->bool_player_type}}"
                   data-status="{{$eventAndStatus['status']}}">
                  <td class="text-nowrap">{{$eventAndStatus['event']->id}}</td>
                  <td class="text-nowrap">{{$eventAndStatus['event']->event_name}}</td>
                  <td class="text-nowrap">{{$eventAndStatus['event']->sex}}</td>
                  <td class="text-nowrap">{{$eventAndStatus['event']->age_division}}</td>
                  <td class="text-nowrap">{{$eventAndStatus['event']->player_type}}</td>
                  <td class="text-nowrap @if ($eventAndStatus['status']==3) text-danger @endif ">
                    {{$eventAndStatus['event']->entry_count}} / {{$eventAndStatus['event']->persons}}</td>
                  @auth
                  <td class="text-nowrap">
                    @if ($eventAndStatus['status']==1)
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input entryCheck"
                       id="entryCheck{{$eventAndStatus['event']->id}}" name="eventIDs[]" value="{{$eventAndStatus['event']->id}}">
                      <label class="custom-control-label" for="entryCheck{{$eventAndStatus['event']->id}}">
                        エントリーする</label>
                    </div>
                    @elseif ($eventAndStatus['status']==2)
                    <div class="btn btn-success disabled">
                      エントリー済
                    </div>
                    @elseif ($eventAndStatus['status']==3)
                    <div class="btn btn-danger disabled">
                      満員
                    </div>
                    @elseif ($eventAndStatus['status']==0)
                    <div class="btn btn-danger disabled">
                      エントリー不可
                    </div>
                    @else
                    @endif
                  </td>
                  @endauth
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @auth
          <div class="container-fluid fixed-bottom p-4 my-bg-black-trans d-none">
            <div class="offset-8 col-4 offset-lg-10 col-lg-2">
              <button type="button" class="btn btn-outline-success btn-lg"
               data-toggle="modal" data-target="#modal1">エントリーする</button>
            </div>
          </div>
          <div class="modal fade" id="modal1" tabindex="-1"
                role="dialog" aria-labelledby="label1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <h6>これらの種目にエントリーしますか？</h6>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">エントリーしない（閉じる）</button>
                  <input class="btn btn-primary" type="submit" value="エントリーする">
                </div>
              </div>
            </div>
          </div>
        </form>
        @endauth

        <div class="cintainer d-none mt-2 my-mb-max mx-auto" id="nothing">
          <h4 class="text-danger">条件に該当する種目がありません</h4>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection


@section('scripts')
<script src="{{ asset('js/events.js') }}"></script>
@endsection
