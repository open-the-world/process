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
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card mb-4">
          <div class="card-header">
            <a class="card-link img_center" href="{{ route('posts.show', ['post' => $post]) }}">
              <img class=header_img src="{{ $post->image}}" alt="image" width="100%" height="211">
            </a>
            <div class="ribbon16-wrapper">
              <span class="ribbon16">
                <a id= figure_likes>
                  {{ $post->likes_count }}
                </a>
                <br>LIKE</span>
            </div>
          </div>

          <div class="card-body">
            <p class="card-text">
              <b>タイトル:</b>{{ $post->title}}
            </p>
            <p class="card-text">
              <b>カテゴリー:</b>{!! nl2br(e(str_limit($post->category, 9))) !!}
            </p>
            <p class="card-text">
              @if(($post->user_id) == null)
                <b>投稿者名:</b>名無しさん
              @else
                <b>投稿者名:</b>{{$post->user->name}}さん
              @endif
            </p>
          </div>
          <div class="box">
            <div class="box-beginner">
              <a href="http://localhost:8000/posts/{{$post->id}}#anchor-beginner">
                初級
              </a>
            </div>
            <div class="box-intermediate">
              <a href="http://localhost:8000/posts/{{$post->id}}#anchor-intermediate">
              中級
              </a>
            </div>
            <div class="box-advanced">
              <a href="http://localhost:8000/posts/{{$post->id}}#anchor-advanced">
              上級
              </a>
            </div>
          </div>
      </div>
    </div>
  @endforeach
  </div>
</div>
@endsection
