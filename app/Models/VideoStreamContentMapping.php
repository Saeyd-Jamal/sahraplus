<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class VideoStreamContentMapping extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'video_stream_content_mapping';
    protected $fillable = ['video_id', 'type', 'quality', 'url', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
