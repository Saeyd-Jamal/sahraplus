<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class UserSearchHistory extends Model
{
    use HasFactory;
    protected $table = 'user_search_histories';
    protected $fillable = ['user_id', 'profile_id', 'search_query', 'search_id', 'type'];
}
