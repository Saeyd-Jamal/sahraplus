<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class ServiceProviders extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'service_providers';
    protected $fillable = ['slug', 'name', 'description', 'payment_method', 'manager_id', 'status', 'created_by', 'updated_by', 'deleted_by', 'contact_email', 'contact_number', 'deleted_at'];
}
