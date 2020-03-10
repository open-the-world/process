<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Post;
use Storage;
use App\Http\Controllers\Controller;

class Category_happinessController extends Controller
{
  public function index()
  {
      $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->where('Category', '=', "happiness")->paginate(10);
      return view('category.happiness', ['posts' => $posts]);
  }
}
