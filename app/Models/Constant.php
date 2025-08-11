<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Constant extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'constants';
    protected $fillable = ['name', 'type', 'value', 'sequence', 'sub_type', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
