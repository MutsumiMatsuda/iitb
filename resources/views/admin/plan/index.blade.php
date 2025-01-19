@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('msg.admin_plan_index') }}　<a href="{{ route('admin.plan.add') }}" class="btn btn-primary">旅行プラン新規作成</a></div>

        @foreach($plans as $plan)
        <div class="card-body yr-1">
          <div class="card card-body bg-info">
            <div class="row">
              <div class="col-md-10">
                <span style="color:#eeeeee; font-weight:bold; font-size:20px">{{$plan->title}}</span>
              </div>
              <div class="col-md-2">
                <a href="{{route('admin.plan.mvup') . '?id=' . $plan->id}}" class="ordered"><img src="{{asset('img/icons/mvup.png')}}" alt="上へ" /></a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2"><a href="{{ route('admin.plan.edit') . '?id=' . $plan->id }}" class="btn btn-primary">編集</a></div>
              <div class="col-md-4"><a href="{{ route('admin.plan.hide') . '?id=' . $plan->id }}" class="btn btn-secondary">非表示にする</a></div>
              <div class="col-md-4"></div>
              <div class="col-md-2"><a href="{{route('admin.plan.mvdw') . '?id=' . $plan->id}}" class="ordered"><img src="{{asset('img/icons/mvdw.png')}}" alt="下へ" /></a></div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection
