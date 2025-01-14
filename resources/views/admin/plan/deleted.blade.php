@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('msg.admin_deleted_plan_index') }}</div>

        @foreach($plans as $plan)
        <div class="card-body yr-1">
          <div class="card card-body bg-info">
            <span style="color:#dddddd; font-weight:bold;">{{$plan->name}}</span>
            <div class="row">
              <div class="col-md-2"><a href="{{ route('admin.plan.revive') . '?id=' . $plan->id }}" class="btn btn-success">削除取消</a></div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection
