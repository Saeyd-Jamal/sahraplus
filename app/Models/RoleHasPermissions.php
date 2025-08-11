<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class RoleHasPermissions extends Model
{
    use HasFactory;
    protected $table = 'role_has_permissions';
    public $timestamps = false;

    protected $fillable = ['permission_id', 'role_id'];

    public function permission()
    {
        return $this->belongsTo(Permissions::class, 'permission_id');
    }

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

}
