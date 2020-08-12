@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} TOP</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-navy">このアプリについて</h3>

  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-12">

        <div class="container mb-5">
          <p class="my-top_text mb-4">
            本アプリは水泳大会の開催を想定して、選手登録や競技へのエントリーの機能を備えたアプリです。
            以下に選手として、そして大会の運営者としての本アプリの機能を紹介します。
          </p>
        </div>

        <!-- 選手向けの機能=============================================================== -->
        <div class="container mb-5">
          <h4 class="my-subtitleborder-royalblue mb-3">選手向けの機能</h4>

          <div class="row justify-content-center mb-5">
            <div class="col-12">
              <p class="my-top_text">
                選手向けの機能の機能を使うため、先ずは画面右上より選手登録（登録済みの方はログイン）をしてください。
                ログイン後はナビゲーションバーの表示が変化します。
              </p>
            </div>
            <div class="col-md-11 my-2">
              <img src="{{ asset('/img/top/navbar_auth.png') }}" alt="navbar_auth" class="" width=100%>
            </div>
            <div class="col-12">
              <p class="my-top_text mb-4">
                登録に必要な情報は氏名，生年月日，性別，メールアドレス，パスワードです。
                水泳種目のエントリー資格を判定するため、年齢や性別の情報が必要となります。
              </p>
            </div>
          </div>

          <h5 class="my-subtitleborder-skyblue col-7">競技へのエントリー</h5>
          <div class="row justify-content-center mb-5">
            <div class="col-md-6">
              <p class="my-top_text">
                無事承認された場合は種目一覧ページへ遷移します。
                そこには現在大会運営が設定した種目が一覧として確認できるようになっています。
              </p>
              <p class="my-top_text">
                種目一覧表の一番右の列に、あなたがその種目への参加資格についての状態が示されています。
                この状態はそれぞれ、「エントリー可能」，「エントリー不可」，「エントリー済」，「満員」の4つであり、
                「エントリー可能」の場合はチェックボックスが表示されます。
                エントリー可能種目にチェック（複数可）を入れると、画面右下にエントリーボタンが現れるので、そこよりエントリー処理を行ってください。
              </p>
            </div>
            <div class="col-md-6">
              <img src="{{ asset('/img/top/events.png') }}" alt="events" class="mt-4" width=100%>
            </div>
            <div class="col-12">
              <p class="my-top_text mb-4">
                種目数が多くなってくると、参加可能な種目を探すことが手間になる場合があります。
                その場合は、条件検索を利用してください。また、「参加可能種目」ボタンを利用すれば参加可能種目のみを表示することができます。
              </p>
            </div>
            <div class="col-8">
              <img src="{{ asset('/img/top/Narrowdown.png') }}" alt="Narrowdown" class="" width=100%>
            </div>
          </div>

          <h5 class="my-subtitleborder-skyblue col-7">マイページ</h5>
          <div class="row justify-content-center mb-5">
            <div class="col-md-6">
              <img src="{{ asset('/img/top/mypage.png') }}" alt="mypage" class="" width=100%>
            </div>
            <div class="col-md-6">
              <p class="my-top_text mb-4">
                登録した選手情報はマイページにて確認できます。マイページからは、登録情報の一部変更、退会の申請を行うことができます。
              </p>
            </div>
          </div>

          <h5 class="my-subtitleborder-skyblue col-7">エントリー一覧</h5>
          <div class="row justify-content-center mb-5">
            <div class="col-md-6">
              <p class="my-top_text">
                エントリー一覧では、自分がエントリー中の種目について、種目の内容や開始時間を確認できます。
                また、右端のボタンから種目の辞退を行うことができます。
              </p>
            </div>
            <div class="col-md-6">
              <img src="{{ asset('/img/top/entries.png') }}" alt="entries" class="" width=100%>
            </div>
          </div>
        </div>

        <!-- 大会運営向けの機能=============================================================== -->
        <div class="container mb-5">
          <h4 class="my-subtitleborder-royalblue mb-3">大会運営向けの機能</h4>

          <p class="my-top_text mb-4">
            大会の運営アカウントでログインすると、ナビゲーションバーにて運営のため、
            種目・レース等を操作する以下の機能が選べるようになります。
          </p>

          <h5 class="my-subtitleborder-skyblue col-7">種目・レースについて</h5>
          <div class="row justify-content-center mb-5">
            <div class="col-md-5">
              <img src="{{ asset('/img/top/relation.png') }}" alt="relation" class="mt-3" width=100%>
            </div>
            <div class="col-md-7">
              <p class="my-top_text mb-4">
                機能の説明の前に、種目とレースについての説明をします。
                種目は「泳法」，「対象年齢区分」，「対象性別」当の競技内容の情報を含んだまとまりであり、重複は許されません。
                レースは上記の種目に属するようにして存在し、開始時間などの情報を保持しています。
                １種目につき１レースでは、設備の都合などもあり全エントリー選手が競技を行うことができない場合が多いです。
                よって１種目につき複数のレースを所有して、選手を入れ替えて繰り返し同じ種目のレースを行うように設計しています。
              </p>
            </div>
          </div>

          <h5 class="my-subtitleborder-skyblue col-7">選手情報の確認</h5>
          <div class="row justify-content-center mb-5">
            <div class="col-md-7">
              <p class="my-top_text mb-4">
                大会に登録している選手の情報を一覧で確認できます。
                右側の詳細ボタンから詳細ページへ遷移すると、選手の登録情報とエントリー中の種目を確認できます。
              </p>
            </div>
            <div class="col-md-5">
              <img src="{{ asset('/img/top/players.png') }}" alt="players" class="mt-3" width=100%>
            </div>
          </div>

          <h5 class="my-subtitleborder-skyblue col-7">全体レース情報</h5>
          <div class="row justify-content-center mb-5">
            <div class="col-md-4">
              <img src="{{ asset('/img/top/hole.png') }}" alt="hole" class="mt-3" width=100%>
            </div>
            <div class="col-md-8">
              <p class="my-top_text mb-4">
                大会に登録された種目と、それに参加する選手に関する情報を一括で確認できます。
                このページから競技結果の入力やレーススケジュールの変更，種目・レース削除などを行うページへと遷移できます。
              </p>
            </div>
          </div>

          <h5 class="my-subtitleborder-skyblue col-7">種目登録</h5>
          <div class="row justify-content-center mb-5">
            <div class="col-md-7">
              <p class="my-top_text mb-4">
                必要な項目を入力することで種目の新たに種目を追加できます。
                重複する内容の種目を登録しようとするとエラーが返還されます。
              </p>
            </div>
            <div class="col-md-5">
              <img src="{{ asset('/img/top/makeEvent.png') }}" alt="makeEvent" class="mt-3" width=100%>
            </div>
          </div>


          <p class="my-top_text mb-4">
            ログインページには仮アカウントからワンクリックでログインできる「簡単ログインボタン」も用意しております。
            まずはログインして、以上の機能を使ってみてください。
          </p>
        </div>


      </div>
    </div>
  </div>
</div>
@endsection

@section('sidebar')
  @include('developer')
@endsection
