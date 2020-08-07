@extends('layouts.error')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} | 500エラー</title>
@endsection


@section('content')
    <div class="container-fluid text-center">
        <h1 class="my-auto">500 | システムエラーが発生しました。</h1>
    </div>
@endsection
