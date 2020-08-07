@extends('layouts.mail')

@section('content')
  <h5><strong>{{$name}} 様</strong></h5>
  <p>お問い合わせ頂きありがとうございます。SwimCompeカスタマーサポートでございます。</p>
  <br>
  <p>以下の内容を確認し、改めて3営業日以内にご返信させていただきます。</p>
  <br>
  <p>----お問い合わせ内容----</p>
  <p>{{$content}}</p>
  <p>-----------------------</p>
  <br>
  <p>本メールに心当たりがない場合は、お手数をおかけしますが読み飛ばしていただけましたら幸いです。</p>
  <p><span class="font-italic">SwimCompe</span></p>
@endsection
