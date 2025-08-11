<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Modules extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'modules';
    protected $fillable = ['module_name', 'description', 'more_permission', 'status', 'deleted_at', 'is_custom_permission'];
}
