<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class EntertainmentCountryMapping extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'entertainment_country_mapping';
    protected $fillable = ['entertainment_id', 'country_id', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
