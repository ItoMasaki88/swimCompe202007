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

        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>
        <h1 class="display-3">MOMOMOMO</h1>

      </div>
    </div>
  </div>
</div>
@endsection

@section('sidebar')
  @include('developer')
@endsection
