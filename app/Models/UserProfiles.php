<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserProfiles extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_profiles';
    protected $fillable = ['about_self', 'expert', 'facebook_link', 'instagram_link', 'twitter_link', 'dribbble_link', 'user_id', 'deleted_at'];
}
