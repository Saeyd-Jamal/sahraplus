<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Addresses extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'addresses';
    protected $fillable = ['address_line_1', 'address_line_2', 'postal_code', 'city', 'state', 'country', 'latitude', 'longitude', 'is_primary', 'addressable_type', 'addressable_id', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
