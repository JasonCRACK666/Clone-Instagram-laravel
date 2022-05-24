<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    protected $fillable = ['image', 'user_id', 'content', 'hashtags'];

    // * Query Scope
    public function scopeFilter($query, array $filters)
    {
        if ($filters['hashtag'] ?? false) {
            $query->where('hashtags', 'like', '%' . request('hashtag') . '%');
        }

        if ($filters['search'] ?? false) {
            $query
                ->where('content', 'like', '%' . request('search') . '%')
                ->orWhere('hashtags', 'like', '%' . request('search') . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    use HasFactory;
}
