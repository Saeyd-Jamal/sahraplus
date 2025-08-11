<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Seasons extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'seasons';
    protected $fillable = ['tmdb_id', 'season_index', 'name', 'poster_url', 'entertainment_id', 'trailer_url_type', 'trailer_url', 'access', 'status', 'plan_id', 'short_desc', 'description', 'created_by', 'updated_by', 'deleted_by', 'deleted_at', 'poster_tv_url'];
}
