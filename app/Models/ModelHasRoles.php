<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class ModelHasRoles extends Model
{
    use HasFactory;
    protected $table = 'model_has_roles';
    public $timestamps = false;

    protected $fillable = ['role_id', 'model_type', 'model_id'];

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

}
