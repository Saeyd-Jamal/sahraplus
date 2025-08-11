<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Migrations extends Model
{
    use HasFactory;
    protected $table = 'migrations';
    public $timestamps = false;

    protected $fillable = ['migration', 'batch'];
}
