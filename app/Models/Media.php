<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $fillable = [
        'name',
        'file_path',
        'mime_type',
        'size',
        'uploader_id',
        'alt',
        'title',
        'caption',
        'description',
    ];
}
