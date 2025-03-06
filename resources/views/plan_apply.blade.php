@extends('layouts.user')
@section('title', $m->title)
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2 style="margin-bottom:30px;">{{$m->title}}</h2>
        <h3 style="margin-bottom:20px;">{!!nl2br($m->guide)!!}</h3>
        <form action="{{ route($m->route) }}" method="post" enctype="multipart/form-data">
          @if (count($errors) > 0)
            <ul>
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif
          <div class="form-group row">
            <label class="col-md-2">お名前</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="name" value="{{ old('name', $apl->name) }}" {{$m->readonly}}>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">よみがな</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="kana" value="{{ old('kana', $apl->kana) }}" {{$m->readonly}}>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">郵便番号</label>
            <div class="col-md-2">
              <input type="text" class="form-control" name="zip" id="zip" value="{{ old('zip', $apl->zip) }}" {{$m->readonly}}>
            </div>
            @if($m->isInput())
            <div class="col-md-2">
              <button type="button" class="btn btn-primary" onClick="searchAddress()">住所検索</button>
            </div>
            @endif
          </div>
          <div class="form-group row">
            <label class="col-md-2">住所</label>
            <div class="col-md-10">
              <textarea class="form-control" name="address" id="address" rows="3" {{$m->readonly}}>{{ old('address', $apl->address) }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">電話番号</label>
            <div class="col-md-10">
              <input type="tel" class="form-control" name="tel" value="{{ old('tel', $apl->tel) }}" {{$m->readonly}}>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">メールアドレス</label>
            <div class="col-md-10">
              <input type="email" class="form-control" name="email" value="{{ old('email', $apl->email) }}" {{$m->readonly}}>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">旅行プラン</label>
            <div class="col-md-10">
              @if($m->isInput())
              <select name ="plan_id">
              @foreach($plans as $plan)
                <option value="{{ $plan->id }}" @if(old('plan_id') == $plan->id || $apl->plan_id == $plan->id) selected="selected" @endif>{{ $plan->title }}</option>
              @endforeach
              </select>
              @else
              <input type="text" class="form-control" name="plan_name" value="{{ old('plan_name', $apl->plan()->title) }}" {{$m->readonly}}>
              <input type="hidden" name="plan_id" value="{{$apl->plan_id}}">
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">大人参加人数</label>
            <div class="col-md-10">
              <input type="number" class="form-control" name="adults" value="{{ old('adults', $apl->adults) }}" {{$m->readonly}}>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">子供参加人数</label>
            <div class="col-md-10">
              <input type="number" class="form-control" name="children" value="{{ old('children', $apl->children) }}" {{$m->readonly}}>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">出発日</label>
            <div class="col-md-10">
              <input type="date" class="form-control" name="day" value="{{ old('day', $apl->day) }}" {{$m->readonly}}>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">メッセージ</label>
            <div class="col-md-10">
              <textarea class="form-control" name="message" rows="8" {{$m->readonly}}>{{ old('message', $apl->message) }}</textarea>
            </div>
          </div>

          {{ csrf_field() }}
          <div class="form-group row">
            <div class="col-md-2"></div>
            @if($m->isInput())
            <div class="col-md-10 mx-auto">
              <input type="submit" class="btn btn-primary" value="入力内容を確認する">
            </div>
            @else
            <div class="col-md-7">
              <input type="submit" name="correct" class="btn btn-warning" value="入力内容を修正する">
            </div>
            <div class="col-md-3">
              <input type="submit" class="btn btn-primary" value="この内容で送信する">
            </div>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script>
/*
  ④郵便番号で住所検索
*/
function searchAddress() {
  let zip = document.querySelector('#zip').value;
  let el = document.querySelector('#address');
  fetch(`https://api.zipaddress.net/?zipcode=${zip}`)
    .then(response => response.json())
    .then(data => {
      if (data.code === 200) {
        el.value = data.data.fullAddress;
        console.log(data.data.fullAddress);
      } else {
        el.value = '住所が見つかりませんでした。';
      }
    })
    .catch(error => {
      console.error('エラーが発生しました:', error);
      el.value = 'エラーが発生しました。';
    });
}
</script>
@endsection