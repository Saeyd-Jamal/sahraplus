<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class NotificationTemplateContentMapping extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'notification_template_content_mapping';
    protected $fillable = ['template_id', 'language', 'template_detail', 'subject', 'notification_message', 'notification_link', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
