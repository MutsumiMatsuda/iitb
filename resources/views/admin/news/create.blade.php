@extends('layouts.admin')
@section('title', 'お知らせ新規作成')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2 style="margin-bottom:30px;">お知らせ新規作成</h2>
        <form action="{{ route('admin.news.create') }}" method="post" enctype="multipart/form-data">

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
              <input type="date" class="form-control" name="day" value="{{ old('day') }}" placeholder="トップページ一覧、ニュース題名左に表示する日付">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">題名</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="ニュースの題名">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="body">本文</label>
            <div class="col-md-10">
              <textarea class="form-control" name="line" rows="10" placeholder="ニュース本文">{{ old('line') }}</textarea>
            </div>
          </div>
          {{--
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
          --}}
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="お知らせ作成">
        </form>
      </div>
    </div>
  </div>
@endsection
