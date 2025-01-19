@extends('layouts.admin')
@section('title', '旅行プラン編集')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2 style="margin-bottom:30px;">旅行プラン編集</h2>
        <form action="{{ route('admin.plan.update') }}" method="post" enctype="multipart/form-data">

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
              <input type="date" class="form-control" name="day" value="{{ old('day', $plan->day) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">ツアー番号</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="no" value="{{ old('no', $plan->no) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">見出しタイトル</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="title" value="{{ old('title', $plan->title) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">タイトル下コピー</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title', $plan->sub_title) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">概要</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="brief_report" value="{{ old('brief_report', $plan->brief_report) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">出発日</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="departure_date" value="{{ old('departure_date', $plan->departure_date) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">出発日詳細</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="departure_date_detail" value="{{ old('departure_date_detail', $plan->departure_date_detail) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">旅行行程</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="itinerary" value="{{ old('itinerary', $plan->itinerary) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">旅行代金</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="expense" value="{{ old('expense', $plan->expense) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">航空会社</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="airline" value="{{ old('airline', $plan->airline) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">航空会社詳細</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="airline_detail" value="{{ old('airline_detail', $plan->airline_detail) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">利用ホテル</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="hotel" value="{{ old('hotel', $plan->hotel) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">発着</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="departure_place" value="{{ old('departure_place', $plan->departure_place) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">発着詳細</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="departure_place_detail" value="{{ old('departure_place_detail', $plan->departure_place_detail) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">添乗員</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="guide" value="{{ old('guide', $plan->guide) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">最少催行人員</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="needed_customers" value="{{ old('needed_customers', $plan->needed_customers) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="body">お知らせ</label>
            <div class="col-md-10">
              <textarea class="form-control" name="report" rows="10">{{ old('report', $plan->report) }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="body">新着情報</label>
            <div class="col-md-10">
              <textarea class="form-control" name="news" rows="3">{{ old('news', $plan->news) }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="title">パンフレット表</label>
            <div class="col-md-4">
              <input type="file" class="form-control-file" name="image_front">
            </div>
            @if(!empty($plan->image_front))
            <div class="col-md-3 form-text text-info">
              <h5 style="color:#fff">設定中</br>{{$plan->image_front}}</h5>
            </div>
            <div class="col-md-3">
              <img src="{{asset($plan->getFrontImgUrl())}}" height="200">
            </div>
            @endif
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="title">パンフレット裏</label>
            <div class="col-md-4">
              <input type="file" class="form-control-file" name="image_back">
            </div>
            @if(!empty($plan->image_back))
            <div class="col-md-3 form-text text-info">
              <h5 style="color:#fff">設定中</br>{{$plan->image_back}}</h5>
            </div>
            <div class="col-md-3">
              <img src="{{asset($plan->getBackImgUrl())}}" height="200">
            </div>
            @endif
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="title">ダウンロード用pdf</label>
            <div class="col-md-4">
              <input type="file" class="form-control-file" name="pdf">
            </div>
            @if(!empty($plan->pdf))
            <div class="col-md-3 form-text text-info">
              <h5 style="color:#fff">設定中</br>{{$plan->pdf}}</h5>
            </div>
            <div class="col-md-3">
              <embed type="application/pdf" src="{{asset($plan->getPdfUrl())}}" style="height: 200px; overflow: hidden;">
            </div>
            @endif
          </div>

          {{ csrf_field() }}
          <input type="hidden" name="id" value='{{$plan->id}}'/>
          <input type="submit" class="btn btn-primary" value="プラン更新">
        </form>
      </div>
    </div>
  </div>
@endsection
