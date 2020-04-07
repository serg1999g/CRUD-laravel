<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package Modules\Auth\Models
 */
class Role extends Model
{
    protected $table = 'roles_table';

    protected $fillable = [
        'id', 'name', 'slug',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
