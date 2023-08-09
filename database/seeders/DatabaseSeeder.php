<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

  public function run(): void
  {

    // Create my account with posts
    User::factory()->create([
      'name' => 'Andrey',
      'email' => 'andrey@mail.ru',
      'password' => '123'
    ])->each(function ($user) {
      Post::factory()
        ->count(10)
        ->create(['user_id' => $user->id]);
    });

    // Create tags
    $tagsList = [
      'PHP',
      'Laravel',
      'Databases',
      'Docker',
      'Blade templates',
      'Javascript'
    ];

    foreach ($tagsList as $tag) {
      Tag::create(['name' => $tag]);
    }

    // Create Users with Posts
    User::factory()
      ->has(Post::factory()->count(10))
      ->count(20)
      ->create();

    // Attach tags to posts
    $posts = Post::all();
    $tags = Tag::all();
    foreach ($posts as $post) {
      $randomTags = $tags->random(rand(0, 3))->pluck('id');
      $post->tags()->attach($randomTags);
    }
  }
}
