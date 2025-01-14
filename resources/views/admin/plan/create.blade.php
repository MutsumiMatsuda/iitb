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
            <label class="col-md-2">日付</label>
            <div class="col-md-10">
              <input type="date" class="form-control" name="day" value="{{ old('day') }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">名前</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">リンク先</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="link" value="{{ old('link') }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="body">お知らせ</label>
            <div class="col-md-10">
              <textarea class="form-control" name="note" rows="3">{{ old('note') }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="title">画像</label>
            <div class="col-md-10">
              <input type="file" class="form-control-file" name="image">
            </div>
          </div>
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="プラン作成">
        </form>
      </div>
    </div>
  </div>
@endsection
