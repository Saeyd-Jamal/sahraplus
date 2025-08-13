<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Settings extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'settings';
    protected $fillable = ['name', 'val', 'type', 'datatype', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
