<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class WatchHistories extends Model
{
    use HasFactory;
    protected $table = 'watch_histories';
    protected $fillable = ['user_id', 'profile_id', 'watchable_type', 'watchable_id', 'duration_watched'];

    public function userMultiProfile()
    {
        return $this->belongsTo(UserMultiProfiles::class, 'profile_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

}
