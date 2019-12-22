<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Storage;
use Auth;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->paginate(10);
        $disk = Storage::disk('s3');
        $files = $disk->files('/');
        return view('posts.index', ['posts' => $posts,]);
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'category' => 'required|max:50',
            'image' => 'required|file|image',
            'beginner' => 'required|max:2000',
            'intermediate' => 'required|max:2000',
            'advanced' => 'required|max:2000',
        ]);

        $file = $params['image'];
        $fileContents = file_get_contents($file->getRealPath());
        $disk = Storage::disk('s3');
        $disk->put($file->hashName(), $fileContents, 'public');
        $imageUrl = $disk->url($file->hashName(), $fileContents, 'public');
        $params['image'] = $imageUrl;
        Post::create($params);
        return redirect()->route('top');
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        $like = Auth::check()
          ? $post->likes()->where('user_id', Auth::user()->id)->first()
          : null
        ;

        return view('posts.show', [
            'post' => $post,
            'like' => $like,
        ]);
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($post_id, Request $request)
    {
        $params = $request->validate([
          'title' => 'required|max:50',
          'category' => 'required|max:50',
          'beginner' => 'required|max:2000',
          'intermediate' => 'required|max:2000',
          'advanced' => 'required|max:2000',
        ]);

        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();

        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);

        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('top');
    }
}
