<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Genre extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'genres';
    protected $fillable = ['name', 'slug', 'file_url', 'description', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
