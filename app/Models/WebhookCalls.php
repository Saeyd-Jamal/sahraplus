<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class WebhookCalls extends Model
{
    use HasFactory;
    protected $table = 'webhook_calls';
    protected $fillable = ['name', 'url', 'headers', 'payload', 'exception'];
}
