<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class JobBatch extends Model
{
    use HasFactory;
    protected $table = 'job_batches';
    public $timestamps = false;

    protected $fillable = ['name', 'total_jobs', 'pending_jobs', 'failed_jobs', 'failed_job_ids', 'options', 'cancelled_at', 'finished_at'];
}
