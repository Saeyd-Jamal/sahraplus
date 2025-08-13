<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class LiveTvChannel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'live_tv_channel';
    protected $fillable = ['name', 'poster_url', 'category_id', 'thumb_url', 'access', 'plan_id', 'description', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at', 'poster_tv_url'];
}
