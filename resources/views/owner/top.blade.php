@extends('layout')

@section('content')
<h1>CSV</h1>
<h1 class="my-5">登録ユーザー管理</h1>
<form method="get" action="">
  <div class="row">
    <div class="col-9">
      <div class="form-group">
        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Search..." value="">
      </div>
    </div>
    <div class="col-3">
      <button id="s" type="submit" class="btn btn-primary btn-block font-weight-bold">Search</button>
    </div>
  </div>
</form>
<div class="mb-3">
  <a href="{{ route('export.owner', ['keyword' => $keyword]) }}" class="btn btn-primary font-weight-bold"><i class="fas fa-download"></i> Export to CSV</a>
</div>
<div class="small">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>name</th>
        <th>email</th>
        <th>password</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $user_list as $user )
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->password }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
