<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class EntertainmentViews extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'entertainment_views';
    protected $fillable = ['entertainment_id', 'user_id', 'profile_id', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
