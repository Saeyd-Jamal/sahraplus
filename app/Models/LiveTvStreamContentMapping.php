<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class LiveTvStreamContentMapping extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'live_tv_stream_content_mapping';
    protected $fillable = ['tv_channel_id', 'type', 'stream_type', 'embedded', 'server_url', 'server_url1', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
