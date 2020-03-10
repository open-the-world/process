<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  public function index()
  {
      return view('posts.help');
  }
}
