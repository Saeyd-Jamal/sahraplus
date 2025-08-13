<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class RoleHasPermission extends Model
{
    use HasFactory;
    protected $table = 'role_has_permissions';
    public $timestamps = false;

    protected $fillable = ['permission_id', 'role_id'];

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}
