<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Storage;
use Auth;

class mypageController extends Controller
{
  public function index(Request $request){
    $user = Auth::user();
    return view('posts.mypage',['user' => $user]);
  }
}
