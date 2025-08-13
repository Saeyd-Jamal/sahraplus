<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Page extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pages';
    protected $fillable = ['name', 'slug', 'sequence', 'description', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
