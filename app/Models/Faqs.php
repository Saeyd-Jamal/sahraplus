<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Faqs extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'faqs';
    protected $fillable = ['question', 'answer', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
