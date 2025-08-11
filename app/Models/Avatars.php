<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Avatars extends Model
{
    use HasFactory;
    protected $table = 'avatars';
    protected $fillable = ['image', 'guest', 'child'];
}
