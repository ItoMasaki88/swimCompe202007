@extends('layouts.swim')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} 大会情報</title>
@endsection

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-navy">大会情報</h3>

  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-12">

        <h1>○○市水泳大会</h1>

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
