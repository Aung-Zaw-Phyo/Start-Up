<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'files' => 'array',
    ];

    public function postable(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopeAdminPosts($query)
    {
        return $query->where('postable_type', get_class(auth()->user()));
    }

    public function scopeUserPosts($query)
    {
        return $query->whereNot('postable_type', get_class(auth()->user()));
    }
}
