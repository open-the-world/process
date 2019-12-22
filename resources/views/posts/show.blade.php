@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <div class="mb-4 text-right">
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

            </div>

            <h1 class="h5 mb-4">
                <b>タイトル:</b>{{ $post->title }}
            </h1>

            <div id=header_img align="center">
              <img src="{{ $post->image}}" alt="image">
            </div>

            <p class="mb-5">
                <b>投稿者名:</b>{!! nl2br(e($post->name)) !!}
            </p>

            <p class="mb-5">
                <b>カテゴリー:</b>{!! nl2br(e($post->category)) !!}
            </p>

            <p class="mb-5" id="anchor-beginner">
                <b>初級:</b>{!! nl2br(($post->beginner)) !!}
            </p>

            <p class="mb-5" id="anchor-intermediate">
                <b>中級:</b>{!! nl2br(($post->intermediate)) !!}
            </p>

            <p class="mb-5" id="anchor-advanced">
                <b>上級:</b>{!! nl2br(($post->advanced)) !!}
            </p>

            @if (Auth::check())
            @if ($like)
              {{ Form::model($post, array('action' => array('LikesController@destroy', $post->id, $like->id))) }}
                <button type="submit" id="delete_button">
                  <img src="https://media-process-img.s3.ap-northeast-1.amazonaws.com/icon/like.png" width="16%" height="16%">
                  <p>Like {{ $post->likes_count }}</p>
                </button>
                <script type="text/javascript">
                $(function() {
                  $('#delete_button').on('click', function() {
                      $.ajax({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          url: './destroy',
                          type: 'POST',
                          data: {'post_id': {{ $post->id }}, '_method': 'DELETE'}
                      })
                      // Ajaxリクエストが成功した場合
                      .done(function(data) {
                          console.log("OK");
                      })
                      // Ajaxリクエストが失敗した場合
                      .fail(function(data) {
                          console.log("Not OK");
                      });
                  });
              });
              </script>
              {!! Form::close() !!}
            @else
              {{ Form::model($post, array('action' => array('LikesController@store', $post->id))) }}
                <button type="submit">
                  <img src="https://media-process-img.s3.ap-northeast-1.amazonaws.com/icon/yet.like.png" width="16%" height="16%">
                  Like {{ $post->likes_count }}
                </button>
              {!! Form::close() !!}
            @endif
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
