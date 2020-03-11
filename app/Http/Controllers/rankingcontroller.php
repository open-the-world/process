<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Storage;

class RankingController extends Controller
{
  public function index()
  {
      $posts = Post::orderBy('likes_count', 'desc')->paginate(10);
      return view('posts.ranking',['posts' => $posts]);
  }
}
