<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * @package Modules\Auth\Models
 */
class Permission extends Model
{
    protected $table = 'permission_table';

    protected $fillable = [
        'id', 'name', 'slug',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }
}
