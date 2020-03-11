<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>process blog</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top">
       <div class="container">
         <a class="navbar-brand" href="{{ url('/') }}">
           process
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div id="navbarResponsive">
           <ul>
               <li>
                 <a class="nav-link" href="{{ url('/') }}">
                   HOME
                   <span class="sr-only">(current)</span>
                 </a>
               </li>
               <li>
                 <a class="nav-link" href="{{ url('/ranking') }}">ランキング</a>
               </li>
               <li>
                 <a class="nav-link" href="{{ url('/category') }}">カテゴリー</a>
               </li>
               <!-- Authentication Links -->
             @guest
               <li>
                   <a class="nav-link" href="{{ route('login') }}">ログイン</a>
               </li>
               @if (Route::has('register'))
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('register') }}">新規登録</a>
                   </li>
               @endif
             @else
               <li class="nav-item dropdown">
                   <a id="navbarDropdown" class="nav-link dropdown-toggle" href="http://localhost:8000/login" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       {{ Auth::user()->name }} <span class="caret"></span>
                   </a>

                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                       <a class="dropdown-item" href="http://localhost:8000/mypage">
                          マイページ
                       </a>
                       <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           ログアウト
                       </a>

                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>
                   </div>
               </li>
             @endguest
               <li>
                 <form action="{{url('/search')}}">
                   <div>
                     <input type="text" name="keyword" value="{{ isset($keyword) ? $keyword : '' }}" id= "search-box" placeholder="検索">
                     <input id = "search_button" type="image" src="https://media-process-img.s3.ap-northeast-1.amazonaws.com/icon/search.png" width="15%" height="15%">
                   </div>
                 </form>
               </li>
               <li>
                 <a href="{{ route('posts.create') }}">
                   <img src="https://media-process-img.s3.ap-northeast-1.amazonaws.com/icon/write.png" width="30%" height="30%">
                 </a>
               </li>
                @can('admin')
                <li>
                  <a href="{{ url('/') }}">
                    管理
                  </a>
                </li>
                @endcan
                <li>
                  <a href="{{ url('/help') }}">
                    <img src="https://media-process-img.s3.ap-northeast-1.amazonaws.com/icon/help.png" width="30%" height="30%">
                  </a>
                </li>
           </ul>
         </div>
       </div>
     </nav>

    <div>
        @yield('content')
    </div>

    <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">process &copy; wrap by flow 2019</p>
    </div>
    <!-- /.container -->
  </footer>
  <script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>
