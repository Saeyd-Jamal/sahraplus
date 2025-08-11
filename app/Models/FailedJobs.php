<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class FailedJobs extends Model
{
    use HasFactory;
    protected $table = 'failed_jobs';
    public $timestamps = false;

    protected $fillable = ['uuid', 'connection', 'queue', 'payload', 'exception', 'failed_at'];
}
