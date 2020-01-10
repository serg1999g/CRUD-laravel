<?php

namespace App\Traits;

use App\Role;

/**
 * Trait HasRolesAndPermissionsTrait
 * @package App\Traits
 */
trait HasRolesAndPermissionsTrait
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    /**
     * assign a role during user registration
     * @param Role $role
     * @return mixed
     */
    public function assignRole(Role $role)
    {
        return $this->roles()->save($role);
    }

    /**
     * Check if the current logged in user has a role
     * @param mixed ...$roles
     * @return bool
     */
    public function hasRole(... $roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if the Role with Permission is tied to the User
     * @param $permission
     * @return bool
     */
    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }


    /**
     * Checks if the User has Permissions through the Role
     * @param $permission
     * @return bool
     */
    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission);
    }
}

