<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserReminder extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_reminder';
    protected $fillable = ['entertainment_id', 'user_id', 'profile_id', 'release_date', 'is_remind', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
