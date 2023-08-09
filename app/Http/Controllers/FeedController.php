<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(Request $request) 
    {
      /*
      $posts = Post::query()
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->get();
      */
      $tag = $request->tag;
      
      if (! $tag) {
        $posts = Post::with(['user', 'tags'])->get();
        return view('feed', compact('posts'));
      }

      $tag = Tag::find($tag);
      $posts = $tag->posts()->with(['user', 'tags'])->get();
      return view('feed', compact('posts', 'tag'));
    }

    public function show(Post $post)
    {
      return view('show', compact('post'));
    }
}
