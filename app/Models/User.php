<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'users';
    protected $fillable = ['username', 'first_name', 'last_name', 'email', 'mobile', 'login_type', 'file_url', 'gender', 'date_of_birth', 'email_verified_at', 'password', 'is_banned', 'is_subscribe', 'status', 'last_notification_seen', 'address', 'user_type', 'pin', 'otp', 'is_parental_lock_enable', 'remember_token', 'deleted_at', 'father_code'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function commentLikes()
    {
        return $this->hasMany(CommentLike::class, 'user_id');
    }

    public function userMultiProfiles()
    {
        return $this->hasMany(UserMultiProfile::class, 'user_id');
    }

    public function watchHistories()
    {
        return $this->hasMany(WatchHistory::class, 'user_id');
    }

}
