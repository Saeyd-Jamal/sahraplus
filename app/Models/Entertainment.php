<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Entertainment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'entertainments';
    protected $fillable = ['name', 'tmdb_id', 'thumbnail_url', 'entlogo', 'numberedimage', 'poster_url', 'description', 'trailer_url_type', 'type', 'trailer_url', 'movie_access', 'plan_id', 'language', 'IMDb_rating', 'content_rating', 'duration', 'release_date', 'is_restricted', 'video_upload_type', 'video_url_input', 'video_quality_url', 'enable_quality', 'download_status', 'download_type', 'download_url', 'enable_download_quality', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at', 'poster_tv_url'];

    public function sliderItems()
    {
        return $this->hasMany(SliderItem::class, 'item_id');
    }

}
