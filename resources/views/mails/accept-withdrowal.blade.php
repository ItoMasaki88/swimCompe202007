@extends('layouts.mail')

@section('content')
  <h5><strong>{{$name}} 様</strong></h5>
  <p>退会を承認しました。</p>
  <br>
  <p>またのご利用お待ちしております。</p>
  @if ($content !='')
    <br>
    <p>また、以下の意見をお寄せくださり誠にありがとうございます。今後のサービス向上に役立たせていただきます。</p>
    <p>---------ご意見---------</p>
    <p>{{$content}}</p>
    <p>-----------------------</p>
    <br>
  @endif
  <p>本メールに心当たりがない場合は、お手数をおかけしますが読み飛ばしていただけましたら幸いです。</p>
  <p><span class="font-italic">SwimCompe</span></p>
@endsection
