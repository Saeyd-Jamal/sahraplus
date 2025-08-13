<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class NotificationTemplate extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'notification_templates';
    protected $fillable = ['name', 'label', 'description', 'type', 'to', 'bcc', 'cc', 'status', 'channels', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
