@extends('layouts.admin')
@section('title', '旅行プラン新規作成')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2 style="margin-bottom:30px;">旅行プラン新規作成</h2>
        <form action="{{ route('admin.plan.create') }}" method="post" enctype="multipart/form-data">

          @if (count($errors) > 0)
            <ul>
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif
          <div class="form-group row">
            <label class="col-md-2">登録日付</label>
            <div class="col-md-10">
              <input type="date" class="form-control" name="day" value="{{ old('day') }}" placeholder="トップページ一覧、プランタイトル左に表示する日付">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">ツアー番号</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="no" value="{{ old('no') }}" placeholder="ツアー番号">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">見出しタイトル</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="旅行プランのタイトル">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">サブタイトル</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title') }}" placeholder="タイトルの下に表示するキャッチコピー">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">概要</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="brief_report" value="{{ old('brief_report') }}" placeholder="旅行プランの小見出し">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">出発日</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="departure_date" value="{{ old('departure_date') }}" placeholder="小見出し下などで表示する短い出発日">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">出発日詳細</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="departure_date_detail" value="{{ old('departure_date_detail') }}" placeholder="表に出す詳細な出発日">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">旅行行程</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="itinerary" value="{{ old('itinerary') }}" placeholder="表に出す詳細な旅行行程">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">旅行代金</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="expense" value="{{ old('expense') }}" placeholder="表に出す詳細な旅行代金">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">航空会社</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="airline" value="{{ old('airline') }}" placeholder="小見出し下などで表示する短い航空会社名">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">航空会社詳細</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="airline_detail" value="{{ old('airline_detail') }}" placeholder="表に出す詳細な航空会社名">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">利用ホテル</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="hotel" value="{{ old('hotel') }}" placeholder="表に出す詳細なホテル名">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">発着</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="departure_place" value="{{ old('departure_place') }}" placeholder="小見出し下などで表示する短い発着場所">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">発着詳細</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="departure_place_detail" value="{{ old('departure_place_detail') }}" placeholder="表に出す詳細な発着場所">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">添乗員</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="guide" value="{{ old('guide') }}" placeholder="表に出す添乗員説明">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">最少催行人員</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="needed_customers" value="{{ old('needed_customers') }}" placeholder="表に出す最少催行人員(半角数字)">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="body">お知らせ</label>
            <div class="col-md-10">
              <textarea class="form-control" name="report" rows="10" placeholder="表に出すプランの詳細なキャッチコピー">{{ old('report') }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="body">新着情報</label>
            <div class="col-md-10">
              <textarea class="form-control" name="news" rows="3" placeholder="プランの更新やパンフレットに関するニュース">{{ old('news') }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="title">パンフレット表</label>
            <div class="col-md-10">
              <input type="file" class="form-control-file" name="image_front">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="title">パンフレット裏</label>
            <div class="col-md-10">
              <input type="file" class="form-control-file" name="image_back">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="title">ダウンロード用pdf</label>
            <div class="col-md-10">
              <input type="file" class="form-control-file" name="pdf">
            </div>
          </div>
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="プラン作成">
        </form>
      </div>
    </div>
  </div>
@endsection
