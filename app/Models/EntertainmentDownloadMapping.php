<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class EntertainmentDownloadMapping extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'entertainment_download_mapping';
    protected $fillable = ['entertainment_id', 'type', 'quality', 'url', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
