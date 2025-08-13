<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = ['name', 'guard_name', 'is_fixed'];

    public function modelHasPermissions()
    {
        return $this->hasMany(ModelHasPermission::class, 'permission_id');
    }

    public function roleHasPermissions()
    {
        return $this->hasMany(RoleHasPermission::class, 'permission_id');
    }

}
