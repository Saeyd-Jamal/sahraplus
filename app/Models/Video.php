<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Video extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'videos';
    protected $fillable = ['name', 'poster_url', 'trailer_url_type', 'trailer_url', 'access', 'type', 'plan_id', 'IMDb_rating', 'content_rating', 'duration', 'release_date', 'is_restricted', 'short_desc', 'description', 'enable_quality', 'video_upload_type', 'video_url_input', 'download_status', 'download_type', 'download_url', 'enable_download_quality', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at', 'poster_tv_url'];
}
