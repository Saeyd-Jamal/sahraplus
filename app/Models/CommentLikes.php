<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class CommentLikes extends Model
{
    use HasFactory;
    protected $table = 'comment_likes';
    protected $fillable = ['comment_id', 'user_id'];

    public function comment()
    {
        return $this->belongsTo(Comments::class, 'comment_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

}
