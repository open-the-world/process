@extends('layout')

@section('content')
  <main id="main">
    <div class="container mt-8">
      <h1 class="my-4">
        検索結果一覧
      </h1>
      <div class="row">
          @foreach ($posts as $post)
          <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card mb-4">
                <div class="card-header">
                  <img id=header_img src="{{ $post->image}}" alt="image" width="100%" height="211">
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
                    <b>投稿者名:</b>
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

      <div class="paginate">
        <div class="d-flex justify-content-center mb-5">
          {{ $posts->appends(Request::only('keyword'))->links() }}
        </div>
      </div>



@endsection
