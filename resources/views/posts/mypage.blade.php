@extends('layout')

@section('content')
  <main id="mypage_main">
    <div class="container mt-8">
      <h1 class="my-4">
        "{{ $user->name }}"さんのマイページ
      </h1>
      <div class="mb-4">
        <a>投稿記事管理</a>
        <a>お気に入りした記事</a>
      </div>
    </div>
  </main>

  <sidebar id="mypage_sidebar">
@endsection
