<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Post;
use Storage;
use App\Http\Controllers\Controller;

class Category_musicController extends Controller
{
  public function index()
  {
      $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->where('Category', '=', "music")->paginate(10);
      return view('category.music', ['posts' => $posts]);
  }
}
