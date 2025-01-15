@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('msg.admin_dashboard') }}</div>

        <div class="card-body yr-1">
          <div class="card card-body bg-info text-center">
            <a class="nav-link" href="{{ route('admin.notice.edit') . '?id=1' }}">お知らせ管理</a>
          </div>
        </div>

        <div class="card-body yr-1">
          <div class="card card-body bg-info text-center">
            <a class="nav-link" href="{{ route('admin.plan.index') }}">旅行プラン管理</a>
          </div>
        </div>

        <div class="card-body yr-1">
          <div class="card card-body bg-info text-center">
            <a class="nav-link" href="{{ route('admin.plan.hidden') }}">削除済み旅行プラン管理</a>
          </div>
        </div>

        <div class="card-body yr-1">
          <div class="card card-body bg-info text-center">
            お知らせ管理
          </div>
        </div>

        <div class="card-body yr-1">
          <div class="card card-body bg-info text-center">
            お役立ちリンク集管理
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
