<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class ContinueWatch extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'continue_watch';
    protected $fillable = ['entertainment_id', 'user_id', 'profile_id', 'entertainment_type', 'watched_time', 'total_watched_time', 'created_by', 'updated_by', 'deleted_by', 'deleted_at', 'episode_id'];
}
