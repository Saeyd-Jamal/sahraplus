<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class EntertainmentTalentMapping extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'entertainment_talent_mapping';
    protected $fillable = ['entertainment_id', 'talent_id', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
