<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class MobileSetting extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'mobile_settings';
    protected $fillable = ['name', 'slug', 'position', 'value', 'deleted_at'];
}
