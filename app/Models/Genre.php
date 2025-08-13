<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $fillable = [
        'name',
        'slug',
        'file_url',
        'description',
        'image',
        'status',
        'created_by',
        'updated_by',
    ];
    protected $appends = ['image_url'];


    // Accessors
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('imgs/user.jpg');
    }
}
