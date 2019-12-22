<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class helpcontroller extends Controller
{
  public function index()
  {
      return view('posts.help');
  }
}
