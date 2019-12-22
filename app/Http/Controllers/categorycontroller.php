<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Storage;

class categorycontroller extends Controller
{
  public function index()
  {
      $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->paginate(10);
      return view('posts.category', ['posts' => $posts]);
  }
}
