<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['name', 'title', 'guard_name', 'is_fixed'];

    public function modelHasRoles()
    {
        return $this->hasMany(ModelHasRole::class, 'role_id');
    }

    public function roleHasPermissions()
    {
        return $this->hasMany(RoleHasPermission::class, 'role_id');
    }

}
