<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Shorts extends Model
{
    use HasFactory;
    protected $table = 'shorts';
    protected $fillable = ['title', 'description', 'video_path', 'poster_path', 'aspect_ratio', 'likes_count', 'comments_count', 'shares_count', 'share_url', 'is_featured', 'status'];

    public function comments()
    {
        return $this->hasMany(Comments::class, 'short_id');
    }

}
