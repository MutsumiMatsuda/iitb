@extends('layouts.admin')
@section('title', 'お知らせ編集')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2 style="margin-bottom:30px;">お知らせ編集</h2>
        <form action="{{ route('admin.news.update') }}" method="post" enctype="multipart/form-data">

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
              <input type="date" class="form-control" name="day" value="{{ old('day', $news->day) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">題名</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="title" value="{{ old('title', $news->title) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="body">本文</label>
            <div class="col-md-10">
              <textarea class="form-control" name="line" rows="10">{{ old('line', $news->line) }}</textarea>
            </div>
          </div>
          {{--
          <div class="form-group row">
            <label class="col-md-2" for="title">パンフレット表</label>
            <div class="col-md-4">
              <input type="file" class="form-control-file" name="image_front">
            </div>
            @if(!empty($news->image_front))
            <div class="col-md-3 form-text text-info">
              <h5 style="color:#fff">設定中</br>{{$news->image_front}}</h5>
            </div>
            <div class="col-md-3">
              <img src="{{asset($news->getFrontImgUrl())}}" height="200">
            </div>
            @endif
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="title">パンフレット裏</label>
            <div class="col-md-4">
              <input type="file" class="form-control-file" name="image_back">
            </div>
            @if(!empty($news->image_back))
            <div class="col-md-3 form-text text-info">
              <h5 style="color:#fff">設定中</br>{{$news->image_back}}</h5>
            </div>
            <div class="col-md-3">
              <img src="{{asset($news->getBackImgUrl())}}" height="200">
            </div>
            @endif
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="title">ダウンロード用pdf</label>
            <div class="col-md-4">
              <input type="file" class="form-control-file" name="pdf">
            </div>
            @if(!empty($news->pdf))
            <div class="col-md-3 form-text text-info">
              <h5 style="color:#fff">設定中</br>{{$news->pdf}}</h5>
            </div>
            <div class="col-md-3">
              <embed type="application/pdf" src="{{asset($news->getPdfUrl())}}" style="height: 200px; overflow: hidden;">
            </div>
            @endif
          </div>
          --}}

          {{ csrf_field() }}
          <input type="hidden" name="id" value='{{$news->id}}'/>
          <input type="submit" class="btn btn-primary" value="お知らせ更新">
        </form>
      </div>
    </div>
  </div>
@endsection
