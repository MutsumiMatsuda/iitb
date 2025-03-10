@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('msg.admin_hidden_news_index') }}</div>

        @foreach($news as $item)
        <div class="card-body yr-1">
          <div class="card card-body bg-info">
            <span style="color:#dddddd; font-weight:bold;">{{$item->name}}</span>
            <div class="row">
              <div class="col-md-2"><a href="{{ route('admin.news.expose') . '?id=' . $item->id }}" class="btn btn-success">表示する</a></div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection
