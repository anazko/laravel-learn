<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'body',
      'user_id',
    ];

    public function user() 
    {
      return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany {
      return $this->belongsToMany(Tag::class);
    }

    // public function comments(): HasMany {
    //   return $this->hasMany()
    // }

    protected static function booted()
    {
      static::creating(function($post) {
        if (! $post->user_id) {
          $post->user_id = auth()->id();
        }
      });
    }
}
