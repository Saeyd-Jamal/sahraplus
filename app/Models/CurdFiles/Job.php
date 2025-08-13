<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    public $timestamps = false;

    protected $fillable = ['queue', 'payload', 'attempts', 'reserved_at', 'available_at'];
}
