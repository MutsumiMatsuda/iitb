@extends('layouts.admin')
@section('title', 'お知らせ編集')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2 style="margin-bottom:30px;">お知らせ編集</h2>
        <form action="{{ route('admin.notice.update') }}" method="post" enctype="multipart/form-data">

          @if (count($errors) > 0)
            <ul>
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif
          <div class="form-group row">
            <label class="col-md-2" for="body">お知らせ</label>
            <div class="col-md-10">
              <textarea class="form-control" name="line" rows="6">{{ old('line', $notice->line) }}</textarea>
            </div>
          </div>
          {{ csrf_field() }}
          <input type="hidden" name="id" value='{{$notice->id}}'/>
          <input type="submit" class="btn btn-primary" value="お知らせ更新">
        </form>
      </div>
    </div>
  </div>
@endsection
