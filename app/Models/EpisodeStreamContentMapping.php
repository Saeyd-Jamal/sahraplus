<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class EpisodeStreamContentMapping extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'episode_stream_content_mapping';
    protected $fillable = ['episode_id', 'quality', 'type', 'url', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
