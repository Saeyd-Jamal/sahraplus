<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Episode extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'episodes';
    protected $fillable = ['name', 'poster_url', 'entertainment_id', 'season_id', 'trailer_url_type', 'trailer_url', 'access', 'plan_id', 'IMDb_rating', 'content_rating', 'duration', 'release_date', 'is_restricted', 'short_desc', 'description', 'enable_quality', 'video_upload_type', 'video_url_input', 'download_status', 'download_type', 'download_url', 'enable_download_quality', 'status', 'created_by', 'updated_by', 'deleted_by', 'video_quality_url', 'tmdb_id', 'tmdb_season', 'episode_number', 'deleted_at', 'poster_tv_url'];
}
