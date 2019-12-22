@extends('layout')

@section('content')
    <h2>画像一覧</h2>

    <div style="margin: 2rem 0;">
        <a class="btn btn-primary" href="{{ url("/images/create") }}">画像登録</a>
    </div>

    <div class="cards">
        @foreach ($files as $file)
            <div class="card" style="width: 24%;">
                <img class="card-img-top" src="{{ url("/images/${file}") }}" style="height: auto;">

                <div class="card-body">
                    <form action="{{ url("/images/${file}") }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button class="btn btn-danger">削除</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
