@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">タスクを追加する</div>
          <div class="panel-body">
            @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
              <p>{{ $message }}</p>
              @endforeach
            </div>
            @endif
            <form action="{{ route('tasks.create', [ 'folder'=>$id ]) }}" method="post">
              @csrf
              <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
              </div>
              <div class="form-group">
                <label for="title">期限</label>
                <input type="text" name="due_date" id="due_date" class="form-control" value="{{ old('due_date') }}">
              </div>
              <div class="text-right">
                <button type="submit" name="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@include('share.flatpickr.scripts')
@endsection
