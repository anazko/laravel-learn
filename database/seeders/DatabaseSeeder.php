<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

  public function run(): void
  {

    User::factory()->create([
        'name' => 'Andrey',
        'email' => 'andrey@mail.ru',
        'password' => '123'
    ])->each(function($user) {
        Post::factory()
          ->count(10)
          ->create(['user_id' => $user->id]);
    });

    // User::factory()
    //   ->count(20)
    //   ->create()
    //   ->each(function($user) {
    //     Post::factory()
    //       ->count(rand(3,10))
    //       ->create(['user_id' => $user->id])
    //       ->each(function(Post $post) {
    //         $post->tags()->sync([1,2,3]);
    //       });
    // });

    // Create Tags

    $tagsList = ['PHP', 'Laravel', 'Databases', 'Docker', 'Blade templates', 'Javascript'];

    foreach($tagsList as $tag) {
      Tag::create(['name' => $tag]);
    }
    

    // Create Users and Posts with relations
    User::factory()
      ->has(Post::factory()->count(10))
      ->count(20)
      ->create();

    // Attach Tags to Posts
    $tagIds = Tag::all()->map(function ($t) {
      return $t->id;
    })->toArray();

    Post::all()->each(function (Post $post) use ($tagIds) {
      $tagsCount = rand(0, 3);
      if (!$tagsCount) return;
      $randomKeys = array_rand($tagIds, $tagsCount);
      $tags = [];
      if (is_array($randomKeys)) {
        foreach ($randomKeys as $key) {
          $tags[] = $tagIds[$key];
        }
      } else {
        $tags[0] = $tagIds[$randomKeys];
      }
      $post->tags()->attach($tags);
      
    });
  }
}
