<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class EntertainmentGenerMapping extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'entertainment_gener_mapping';
    protected $fillable = ['entertainment_id', 'genre_id', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
