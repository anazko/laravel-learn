<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

  public function run(): void
  {

    // Create my admin account with posts
    User::factory()->create([
      'name' => 'Andrey',
      'email' => 'andrey@mail.ru',
      'password' => '123',
    ])->each(function ($user) {
      Post::factory()
        ->count(10)
        ->create(['user_id' => $user->id]);
    });

    // Create my second test account without admin role
    User::factory()->create([
      'name' => 'Andrey User',
      'email' => 'andrey2@mail.ru',
      'password' => '123',
    ])->each(function ($user) {
      Post::factory()
        ->count(10)
        ->create(['user_id' => $user->id]);
    });

    //Create roles
    $rolesList = [
      'Editor',
      'Moderator',
      'Developer',
      'Admin',
    ];

    foreach ($rolesList as $role) {
      Role::create(['title' => $role]);
    }  

    // Create tags
    $tagsList = [
      'PHP',
      'Laravel',
      'Databases',
      'Docker',
      'Blade templates',
      'Javascript',
    ];

    foreach ($tagsList as $tag) {
      Tag::create(['name' => $tag]);
    }

    // Create Users with Posts
    User::factory()
      ->has(Post::factory()->count(10))
      ->count(20)
      ->create();

    // Attach roles to users
    $adminUser = User::where('email', 'andrey@mail.ru')->first();
    $adminRole = Role::where('title', 'Admin')->first();
    $adminUser->roles()->attach($adminRole);
    
    $roles = Role::where('title', '!=', 'Admin')->get();
    $users = User::where('email', '!=', 'andrey@mail.ru')->get();

    foreach ($users as $user) {
      $randomRoles = $roles->random(rand(1,2))->pluck('id');
      $user->roles()->attach($randomRoles);
    }

    // Attach tags to posts
    $posts = Post::all();
    $tags = Tag::all();
    foreach ($posts as $post) {
      $randomTags = $tags->random(rand(0, 3))->pluck('id');
      $post->tags()->attach($randomTags);
    }

  }
}
