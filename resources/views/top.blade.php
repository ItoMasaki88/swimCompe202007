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

        <p>
          本アプリは水泳大会の開催を想定して、選手登録や競技へのエントリーの機能を備えたアプリです。
          以下に選手として、そして大会の運営者としての本アプリの機能を紹介します。
        </p>

        <h4>選手向けの機能</h4>

        <h5>選手登録</h5>
        <p>
          画面右上より選手登録（登録済みの方はログイン）をしてください。
          登録に必要な情報は氏名，生年月日，性別，メールアドレス，パスワードです。
          水泳種目のエントリー資格を判定するため、年齢や性別の情報が必要となります。
        </p>

        <h5>競技へのエントリー</h5>
        <p>
          無事承認された場合は種目一覧ページへ遷移します。
          そこには現在大会運営が設定した種目が一覧として確認できるようになっています（）。
          種目一覧表の一番右の列に、あなたがその種目への参加資格についての状態が示されています。
          この状態はそれぞれ、「エントリー可能」，「エントリー不可」，「エントリー済」，「満員」の4つであり、
          「エントリー可能」の場合はチェックボックスが表示されます。
          エントリー可能種目にチェック（複数化）を入れると、画面右下にエントリーボタンが現れるので、そこよりエントリー処理を行ってください。
        </p>

      </div>
    </div>
  </div>
</div>
@endsection

@section('sidebar')
  @include('developer')
@endsection
