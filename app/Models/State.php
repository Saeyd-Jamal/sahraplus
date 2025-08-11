<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class State extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'states';
    protected $fillable = ['name', 'country_id', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
