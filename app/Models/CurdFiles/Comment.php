<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'comments';
    protected $fillable = ['short_id', 'user_id', 'parent_id', 'body', 'media_url', 'likes_count', 'replies_count', 'is_edited', 'status', 'deleted_at'];

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function short()
    {
        return $this->belongsTo(Short::class, 'short_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function commentLikes()
    {
        return $this->hasMany(CommentLike::class, 'comment_id');
    }

}
