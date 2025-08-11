<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comments extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'comments';
    protected $fillable = ['short_id', 'user_id', 'parent_id', 'body', 'media_url', 'likes_count', 'replies_count', 'is_edited', 'status', 'deleted_at'];

    public function comment()
    {
        return $this->belongsTo(Comments::class, 'parent_id');
    }

    public function short()
    {
        return $this->belongsTo(Shorts::class, 'short_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'parent_id');
    }

    public function commentLikes()
    {
        return $this->hasMany(CommentLikes::class, 'comment_id');
    }

}
