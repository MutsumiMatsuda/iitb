@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('msg.admin_news_index') }}　<a href="{{ route('admin.news.add') }}" class="btn btn-primary">お知らせ新規作成</a></div>

        @foreach($news as $item)
        <div class="card-body yr-1">
          <div class="card card-body bg-info">
            <div class="row">
              <div class="col-md-10">
                <span style="color:#eeeeee; font-weight:bold; font-size:20px">{{$item->title}}</span>
              </div>
              <div class="col-md-2">
                @if($item->id != $news->first()->id)
                <a href="{{route('admin.news.mvup') . '?id=' . $item->id}}" class="ordered"><img src="{{asset('img/icons/mvup.png')}}" alt="上へ" /></a>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2"><a href="{{ route('admin.news.edit') . '?id=' . $item->id }}" class="btn btn-primary">編集</a></div>
              <div class="col-md-4"><a href="{{ route('admin.news.hide') . '?id=' . $item->id }}" class="btn btn-secondary">非表示にする</a></div>
              <div class="col-md-4"></div>

              @if($item->id != $news->last()->id)
              <div class="col-md-2"><a href="{{route('admin.news.mvdw') . '?id=' . $item->id}}" class="ordered"><img src="{{asset('img/icons/mvdw.png')}}" alt="下へ" /></a></div>
              @endif
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection
