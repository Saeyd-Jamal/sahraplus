<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class VideoDownloadMappings extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'video_download_mappings';
    protected $fillable = ['video_id', 'type', 'quality', 'url', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
