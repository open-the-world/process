<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Storage;
use Auth;

class MypageController extends Controller
{
  public function index(){
    $user = Auth::user();
    $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->where('user_id',Auth::id())->paginate(6);

    return view('posts.mypage',[
      'user' => $user,
      'posts' => $posts,
    ]);
  }
}
