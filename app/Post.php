<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Like;

class Post extends Model
{
    protected $fillable = [
        'title',
        'category',
        'image',
        'beginner',
        'intermediate',
        'advanced',
        'image'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
      return $this->hasMany('App\Like');
    }

    public function like_by()
    {
      return Like::where('user_id', Auth::user()->id)->first();
    }
}
