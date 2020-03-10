<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Post;
use Storage;
use App\Http\Controllers\Controller;

class Category_sportsController extends Controller
{
  public function index()
  {
      $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->where('Category', '=', "sports")->paginate(10);
      return view('category.sports', ['posts' => $posts]);
  }
}
