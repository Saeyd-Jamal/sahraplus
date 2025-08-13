<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class TvLoginSession extends Model
{
    use HasFactory;
    protected $table = 'tv_login_sessions';
    protected $fillable = ['session_id', 'user_id', 'confirmed_at', 'expires_at'];
}
