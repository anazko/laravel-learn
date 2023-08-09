<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    public function __invoke()
    {
      return 'invoke post controller';
    }

    public function index() 
    {
      $posts = Post::where('user_id', auth()->id())
        // ->select(['posts.id', 'title', 'body', 'users.name'])
        // ->join('users', 'posts.user_id', '=', 'users.id')
        ->with(['user', 'tags'])
        ->orderBy('posts.created_at', 'desc')
        ->get();
      return view("User.Post.index", compact('posts'));
    }

    public function show(Post $post) 
    {
      dd($post);
    }

    public function edit(Post $post) {
      $tags = Tag::all();
      return view('User.Post.edit', compact('post', 'tags'));
    }

    public function create() 
    {
      $tags = Tag::all();
      return view("User.Post.create", compact('tags'));
    }

    public function store(Request $request) 
    {
      $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'tags' => 'array',
        'tags.*' => 'integer'
      ]);

      // $post = new Post();
      // $post->title = $validated['title'];
      // $post->body = $validated['body'];
      // $post->user_id = auth()->id();
      // $post->save();   

      if(! isset($validated['tags'])) {
        $validated['tags'] = [];
      }
     
      $post = Post::create($validated);
      $post->tags()->sync($validated['tags']);
            
      return redirect(route('user.posts'));
    }

    public function update(Post $post, Request $request) 
    {
      $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'tags' => 'array',
        'tags.*' => 'integer'
      ]);

      if(! isset($validated['tags'])) {
        $validated['tags'] = [];
      }

      $post->update($validated);
      $post->tags()->sync($validated['tags']);
            
      return redirect(route('user.posts'));
    }

}
