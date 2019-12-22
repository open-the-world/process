@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                投稿の編集
            </h1>

            <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}">
                @csrf
                @method('PUT')

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="title">
                            タイトル
                        </label>
                        <input
                            id="title"
                            name="title"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            value="{{ old('title') ?: $post->title }}"
                            type="text"
                        >
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="category">
                          カテゴリー
                        </label>

                        <textarea
                            id="category"
                            name="category"
                            class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}"
                            rows="1"
                        >{{ old('category')?: $post->category }}</textarea>
                        @if ($errors->has('category'))
                            <div class="invalid-feedback">
                                {{ $errors->first('category') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="beginner">
                          初級
                        </label>

                        <textarea
                            id="beginner"
                            name="beginner"
                            class="form-control {{ $errors->has('beginner') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('beginner') ?: $post->beginner }}</textarea>
                        @if ($errors->has('beginner'))
                            <div class="invalid-feedback">
                                {{ $errors->first('beginner') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="intermediate">
                          中級
                        </label>

                        <textarea
                            id="intermediate"
                            name="intermediate"
                            class="form-control {{ $errors->has('intermediate') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('intermediate') ?: $post->intermediate }}</textarea>
                        @if ($errors->has('intermediate'))
                            <div class="invalid-feedback">
                                {{ $errors->first('intermediate') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="advanced">
                          上級
                        </label>

                        <textarea
                            id="advanced"
                            name="advanced"
                            class="form-control {{ $errors->has('advanced') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('advanced') ?: $post->advanced }}</textarea>
                        @if ($errors->has('advanced'))
                            <div class="invalid-feedback">
                                {{ $errors->first('advanced') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('posts.show', ['post' => $post]) }}">
                            キャンセル
                        </a>

                        <button type="submit" class="btn btn-primary">
                            更新する
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
