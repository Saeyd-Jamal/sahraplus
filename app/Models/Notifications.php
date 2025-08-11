<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Notifications extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = ['type', 'notifiable_type', 'notifiable_id', 'data', 'read_at'];
}
