<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class CastCrew extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cast_crew';
    protected $fillable = ['name', 'file_url', 'type', 'tmdb_id', 'bio', 'place_of_birth', 'dob', 'designation', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
