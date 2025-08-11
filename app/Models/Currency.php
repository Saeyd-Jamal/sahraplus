<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Currency extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'currencies';
    protected $fillable = ['currency_name', 'currency_symbol', 'currency_code', 'is_primary', 'currency_position', 'no_of_decimal', 'thousand_separator', 'decimal_separator', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
