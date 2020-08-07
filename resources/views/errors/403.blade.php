@extends('layouts.error')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} | 403エラー</title>
@endsection


@section('content')
    <div class="container-fluid text-center">
        <h1 class="my-auto">403 | お探しのページへの権限がありません。</h1>
    </div>
@endsection
