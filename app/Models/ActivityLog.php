<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class ActivityLog extends Model
{
    use HasFactory;
    protected $table = 'activity_log';
    protected $fillable = ['log_name', 'description', 'subject_type', 'subject_id', 'event', 'causer_type', 'causer_id', 'properties', 'batch_uuid'];
}
