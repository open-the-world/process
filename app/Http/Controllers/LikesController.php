<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Like;
use Auth;
use App\Post;

class LikesController extends Controller
{
    public function store(Request $request, $postId)
    {
        $like = Like::create(
          array(
            'user_id' => Auth::user()->id,
            'post_id' => $postId
          )
        );

        $post = Post::findOrFail($postId);

        return response()->json([
          'likes_count' => $post->likes()->count(),
          'url' => url('/posts/'.$post->id.'/likes/'.$like->id),
          'image_url' => '//media-process-img.s3.ap-northeast-1.amazonaws.com/icon/like.png',
        ]);
    }

    public function destroy($postId, $likeId) {
      $post = Post::findOrFail($postId);
      $post->like_by()->findOrFail($likeId)->delete();

      return response()->json([
        'likes_count' => $post->likes()->count(),
        'url' => url('/posts/'.$post->id.'/likes'),
        'image_url' => '//media-process-img.s3.ap-northeast-1.amazonaws.com/icon/yet.like.png',
      ]);
    }
}
