<?php

namespace App\Comment;

use App\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 18:40
 */
class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'content', 'user_id', 'commentable_id', 'commentable_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
