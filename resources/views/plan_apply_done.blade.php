@extends('layouts.user')
@section('title', 'お申し込みありがとうございました。')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>{{$apl->name}}様、お申し込み誠にありがとうございました。</h2>
        <h3>弊社からのご案内をお待ちくださいませ。</h3>
        <h3>万が一、三営業日を過ぎても連絡が無かった場合は、</h3>
        <h3>お手数ですが必ずお電話にてお問い合わせくださいませ。</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 mx-auto">
        <a href="/"><input type="button" class="btn btn-primary" value="トップページへ"></a>
      </div>
    </div>
  </div>
@endsection