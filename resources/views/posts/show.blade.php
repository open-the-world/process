@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <div class="mb-4 text-right">
              @if (Auth::check())
                @can('edit', $post)
                  <a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post]) }}">
                      編集する
                  </a>

                  <form
                    style="display: inline-block;"
                    method="POST"
                    action="{{ route('posts.destroy', ['post' => $post]) }}"
                  >
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">削除する</button>
                  </form>
                @endcan
              @else
              @endif
            </div>

            <p class="mb-5">
              <h4>
                <i>
                  <img src="https://media-process-img.s3.ap-northeast-1.amazonaws.com/icon/category.png" width="5%" height="5%">
                  {!! nl2br(e($post->category)) !!}
                </i>
              </h4>
            </p>

            <h1 class="h5 mb-4">
                <h1>{{ $post->title }}</h1>
            </h1>

            <p class="mb-5">
              <img src="https://media-process-img.s3.ap-northeast-1.amazonaws.com/icon/author.png" width="5%" height="5%">
              @if(($post->user_id) == null)
                <a>名無しさん</a>
              @else
                <a>{{$post->user->name}}さん</a>
              @endif
            </p>

            <div id=header_img align="center">
              <img src="{{ $post->image}}" alt="image">
            </div>

            <p class="mb-5" id="anchor-beginner">
              <h2>
                初級:
              </h2>
              <h3>
                {!! nl2br(($post->beginner)) !!}
              </h3>
            </p>

            <p class="mb-5" id="anchor-intermediate">
              <h2>
                中級:
              </h2>
              <h3>
                {!! nl2br(($post->intermediate)) !!}
              </h3>
            </p>

            <p class="mb-5" id="anchor-advanced">
              <h2>
                上級:
              </h2>
              <h3>
                {!! nl2br(($post->advanced)) !!}
              </h3>
            </p>

            @if (Auth::check())
              <button type="submit" id="likes_button">
                @if ($like)
                  <img src="https://media-process-img.s3.ap-northeast-1.amazonaws.com/icon/like.png" width="16%" height="16%" id ="likes_img">
                @else
                  <img src="https://media-process-img.s3.ap-northeast-1.amazonaws.com/icon/yet.like.png" width="16%" height="16%" id ="likes_img">
                @endif
              <text id="likes_counts"></text>
              <script type="text/javascript">
                $(function() {
                  @if ($like)
                    var url = '/posts/{{$post->id}}/likes/{{$like->id}}';
                  @else
                    var url = '/posts/{{$post->id}}/likes';
                  @endif
                  $('#likes_button').on('click', function() {
                      $.ajax({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          url: url,
                          type: 'POST',
                          dataType : "JSON",
                      })
                      // Ajaxリクエストが成功した場合
                      .done(function(data) {
                        $("#likes_counts").text(data.likes_count);
                        $("#likes_img").attr('src', data.image_url);
                        url = data.url;
                        console.log(data);

                      })
                      // Ajaxリクエストが失敗した場合
                      .fail(function(data) {
                          console.log(data);
                      });
                  });
              });
              </script>
            </button>

            @else
              <img src="https://media-process-img.s3.ap-northeast-1.amazonaws.com/icon/like.png" width="4%" height="4%">
              <a>いいねするにはログインが必要です。</a>
            @endif

            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>

                <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
                    @csrf

                    <input
                        name="post_id"
                        type="hidden"
                        value="{{ $post->id }}"
                    >

                    <div class="form-group">
                        <label for="body">
                            本文
                        </label>

                        <textarea
                            id="body"
                            name="body"
                            class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            コメントする
                        </button>
                    </div>
                </form>

                @forelse($post->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>

@endsection
