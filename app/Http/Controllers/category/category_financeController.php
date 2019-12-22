<?php

namespace App\Http\Controllers\category;

use Illuminate\Http\Request;
use App\Post;
use Storage;
use App\Http\Controllers\Controller;

class category_financeController extends Controller
{
  public function index()
  {
      $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->where('category', '=', "finance")->paginate(10);
      return view('category.finance', ['posts' => $posts]);
  }
}
