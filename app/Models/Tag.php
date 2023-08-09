<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @mixin Builder
 */
class Tag extends Model
{
    use HasFactory;

    public function posts(): BelongsToMany {
      return $this->belongsToMany(Post::class);
    }

}
