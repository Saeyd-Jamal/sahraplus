<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserMultiProfile extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_multi_profiles';
    protected $fillable = ['user_id', 'name', 'avatar', 'is_default', 'is_child_profile', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function watchHistories()
    {
        return $this->hasMany(WatchHistory::class, 'profile_id');
    }

}
