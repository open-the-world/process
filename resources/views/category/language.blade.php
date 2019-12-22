@extends('layout')

@section('content')
<h1 class="my-4">
  語学
</h1>

@component('components.category_sidebar')
@endcomponent

<div class="category_main">
  <div class="row">
        @foreach ($posts as $post)
        <div class="col-lg-6 col-md-4 col-sm-12 mb-4">
          <div class="card mb-4">
              <div class="card-header">
                <a class="card-link img_center" href="{{ route('posts.show', ['post' => $post]) }}">
                  <img id=header_img src="{{ $post->image}}" alt="image" width="100%" height="210">
                </a>
              </div>

              <div class="card-body">
                <p class="card-text">
                  <b>タイトル:</b>{{ $post->title}}
                </p>
                <p class="card-text">
                  <b>カテゴリー:</b>{!! nl2br(e(str_limit($post->category, 9))) !!}
                </p>
                <p class="card-text">
                  <b>投稿者名:</b>{!! nl2br(e(str_limit($post->name, 9))) !!}
                </p>
              </div>
          </div>
        </div>
      @endforeach
  </div>
</div>
@endsection
