<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Permissions extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = ['name', 'guard_name', 'is_fixed'];

    public function modelHasPermissions()
    {
        return $this->hasMany(ModelHasPermissions::class, 'permission_id');
    }

    public function roleHasPermissions()
    {
        return $this->hasMany(RoleHasPermissions::class, 'permission_id');
    }

}
