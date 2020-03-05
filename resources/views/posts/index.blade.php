@extends('layout')

@section('content')
      <main id="main">
        <script src="{{ asset('js/leaf.js') }}"></script>
        <div class="container mt-8">
          <h1 class="my-4">
            HOME
          </h1>
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
                        @if (Auth::check())
                        <b>投稿者名:</b>{{$post->user->name}}さん
                        @else
                        <b>投稿者名:</b>名無しさん
                        @endif
                      </p>
                    </div>
                    <div class="box">
                      <div class="box-beginner">
                        <a href="posts/{{$post->id}}#anchor-beginner">
                          初級
                        </a>
                      </div>
                      <div class="box-intermediate">
                        <a href="posts/{{$post->id}}#anchor-intermediate">
                        中級
                        </a>
                      </div>
                      <div class="box-advanced">
                        <a href="posts/{{$post->id}}#anchor-advanced">
                        上級
                        </a>
                      </div>
                    </div>
                </div>
              </div>
            @endforeach
        </div>
      </main>

      <div id="paginate">
        <div class="d-flex justify-content-center mb-5">
            {{ $posts->links() }}
        </div>
      </div>
@endsection
