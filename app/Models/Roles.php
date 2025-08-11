<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['name', 'title', 'guard_name', 'is_fixed'];

    public function modelHasRoles()
    {
        return $this->hasMany(ModelHasRoles::class, 'role_id');
    }

    public function roleHasPermissions()
    {
        return $this->hasMany(RoleHasPermissions::class, 'role_id');
    }

}
