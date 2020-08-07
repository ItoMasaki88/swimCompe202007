@extends('layout')

@section('content')
<div class="card-body">
  <h3 class="m-3 my-titleborder-dimgray">{{$title}}</h3>

  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-11">

        <div class="cintainer mt-2 mb-5">
          <h4 class="text-center">{{$message}}</h4>
          @isset($sub_message)
          <h6 class="text-center">{{$sub_message}}</h6>
          @endisset
          <p class="text-center mt-3"> <a href="{{'/top'}}">TOPへ戻る</a></p>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
