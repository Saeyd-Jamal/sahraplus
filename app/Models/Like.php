<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Like extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'likes';
    protected $fillable = ['entertainment_id', 'user_id', 'is_like', 'profile_id', 'type', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
