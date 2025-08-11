<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Subtitles extends Model
{
    use HasFactory;
    protected $table = 'subtitles';
    protected $fillable = ['language_name', 'url', 'subtitable_type', 'subtitable_id', 'default'];
}
