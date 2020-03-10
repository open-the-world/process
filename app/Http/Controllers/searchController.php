<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Post;
use Storage;

class SearchController extends Controller
{
  public function index(Request $request)
  {
    #キーワード受け取り
    $keyword = $request->input('keyword');

    //もしキーワードが入力されている場合
    if(!empty($keyword))
    {
        //料理名から検索
        $posts = DB::table('posts')
                ->where('title', 'like', '%'.$keyword.'%')
                ->paginate(10);

    }else{//キーワードが入力されていない場合
        $posts = DB::table('posts')->paginate(10);
    }

    $disk = Storage::disk('s3');
    $files = $disk->files('/');

    return view('posts.search',[
        'posts' => $posts,
        'keyword' => $keyword,
        ]);
  }
}
