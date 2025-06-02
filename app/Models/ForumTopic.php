<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'views'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(ForumComment::class, 'topic_id');
    }

    // Get only root comments (not replies)
    public function rootComments()
    {
        return $this->hasMany(ForumComment::class, 'topic_id')->whereNull('parent_id');
    }
} 