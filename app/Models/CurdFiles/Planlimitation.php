<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Planlimitation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'planlimitation';
    protected $fillable = ['title', 'slug', 'description', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
