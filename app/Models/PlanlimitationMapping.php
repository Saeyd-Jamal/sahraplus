<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class PlanlimitationMapping extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'planlimitation_mapping';
    protected $fillable = ['plan_id', 'planlimitation_id', 'limitation_slug', 'limitation_value', 'limit', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
