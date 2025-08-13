<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Banner extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'banners';
    protected $fillable = ['title', 'file_url', 'poster_url', 'type', 'type_id', 'type_name', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at', 'banner_for', 'poster_tv_url'];
}
