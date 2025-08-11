<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Taxes extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'taxes';
    protected $fillable = ['title', 'type', 'value', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
