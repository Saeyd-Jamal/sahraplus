<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class ModelHasPermissions extends Model
{
    use HasFactory;
    protected $table = 'model_has_permissions';
    public $timestamps = false;

    protected $fillable = ['permission_id', 'model_type', 'model_id'];

    public function permission()
    {
        return $this->belongsTo(Permissions::class, 'permission_id');
    }

}
