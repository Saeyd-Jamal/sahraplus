<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $table = 'users';
    // حدّد الحقول المسموح تعبئتها
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'login_type',
        'file_url',
        'gender',
        'date_of_birth',
        'email_verified_at',
        'password',
        'is_banned',
        'is_subscribe',
        'status',
        'last_notification_seen',
        'address',
        'user_type',
        'pin',
        'otp',
        'is_parental_lock_enable',
        'remember_token',
        'father_code',
    ];

    protected $hidden = ['password', 'remember_token'];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'last_notification_seen' => 'datetime',
        'is_parental_lock_enable' => 'boolean',
    ];
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

    // Accessors
    public function getAvatarUrlAttribute()
    {
        return $this->file_url ? asset('storage/' . $this->file_url) : asset('imgs/user.jpg');
    }
}
