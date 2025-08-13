<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class EntertainmentDownload extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'entertainment_downloads';
    protected $fillable = ['entertainment_id', 'user_id', 'entertainment_type', 'is_download', 'type', 'quality', 'device_id', 'url', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
