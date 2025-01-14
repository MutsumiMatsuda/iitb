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
            <span style="color:#dddddd; font-weight:bold;">{{$plan->name}}</span>
            <div class="row">
              <div class="col-md-2"><a href="{{ route('admin.plan.edit') . '?id=' . $plan->id }}" class="btn btn-primary">編集</a></div>
              <div class="col-md-2"><a href="{{ route('admin.plan.delete') . '?id=' . $plan->id }}" class="btn btn-secondary">削除</a></div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection
