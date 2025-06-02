<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    public $timestamps = false;

    public function forumTopics()
    {
        return $this->hasMany(ForumTopic::class);
    }

    public function forumComments()
    {
        return $this->hasMany(ForumComment::class);
    }
}
