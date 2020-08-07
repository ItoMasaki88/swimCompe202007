@extends('layouts.error')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} | 404エラー</title>
@endsection


@section('content')
    <div class="container-fluid text-center">
        <h1 class="my-auto">404 | お探しのページは見つかりません。</h1>
    </div>
@endsection
