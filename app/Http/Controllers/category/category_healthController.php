<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Post;
use Storage;
use App\Http\Controllers\Controller;

class Category_healthController extends Controller
{
  public function index()
  {
      $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->where('Category', '=', "health")->paginate(10);
      return view('category.health', ['posts' => $posts]);
  }
}
