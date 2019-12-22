@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                投稿の新規作成
            </h1>

            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="title">
                            タイトル
                        </label>
                        <input
                            id="title"
                            name="title"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            value="{{ old('title') }}"
                            type="text"
                        >
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                      <label for="image">
                        画像
                      </label>
                      <input id="file" type="file" name="image">
                    </div>

                    <div class="form-group">
                        <label for="category">
                          カテゴリー
                        </label>

                        <select class="form-control" id="category" name="category">
                          <option value="programming">プログラミング</option>
                          <option value="design">デザイン</option>
                          <option value="language">語学</option>
                          <option value="sports">スポーツ</option>
                          <option value="study">勉強</option>
                          <option value="work">仕事</option>
                          <option value="health">健康</option>
                          <option value="finance">財務</option>
                          <option value="happiness">幸せ</option>
                          <option value="thinking">思考法</option>
                          <option value="music">音楽</option>
                          <option value="cooking">料理</option>
                          <option value="video">動画編集</option>
                          <option value="daily">日常</option>
                          <option value="skill">独自のスキル</option>
                          <option value="educate">子育て</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="beginner">
                          初級
                      </label>
                      <textarea
                          id="beginner"
                          name="beginner"
                          class="form-control {{ $errors->has('beginner') ? 'is-invalid' : '' }}"
                      >{{ old('beginner') }}</textarea>
                      @if ($errors->has('beginner'))
                          <div class="invalid-feedback">
                              {{ $errors->first('beginner') }}
                          </div>
                      @endif

                      <script>
                      $('#beginner').summernote({
                        toolbar: [
                          ['style', ['bold', 'italic', 'underline', 'clear']],
                          ['font', ['strikethrough', 'superscript', 'subscript']],
                          ['fontsize', ['fontsize']],
                          ['color', ['color']],
                          ['para', ['ul', 'ol', 'paragraph']],
                          ['height', ['height']]
                        ]
                      });
                      </script>
                    </div>

                    <div class="form-group">
                        <label for="intermediate">
                            中級
                        </label>

                        <textarea
                            id="intermediate"
                            name="intermediate"
                            class="form-control {{ $errors->has('intermediate') ? 'is-invalid' : '' }}"
                        >{{ old('intermediate') }}</textarea>
                        @if ($errors->has('intermediate'))
                            <div class="invalid-feedback">
                                {{ $errors->first('intermediate') }}
                            </div>
                        @endif

                        <script>
                        $('#intermediate').summernote({
                          toolbar: [
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']]
                          ]
                        });
                        </script>
                    </div>

                    <div class="form-group">
                        <label for="advanced">
                            上級
                        </label>

                        <textarea
                            id="advanced"
                            name="advanced"
                            class="form-control {{ $errors->has('advanced') ? 'is-invalid' : '' }}"
                        >{{ old('advanced') }}</textarea>
                        @if ($errors->has('advanced'))
                            <div class="invalid-feedback">
                                {{ $errors->first('advanced') }}
                            </div>
                        @endif

                        <script>
                        $('#advanced').summernote({
                          toolbar: [
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']]
                          ]
                        });
                        </script>
                    </div>

                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('top') }}">
                            キャンセル
                        </a>

                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
