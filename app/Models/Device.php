<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Device extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'devices';
    protected $fillable = ['user_id', 'device_id', 'device_name', 'active_profile', 'platform', 'deleted_at'];
}
