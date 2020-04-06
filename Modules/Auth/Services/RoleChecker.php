<?php

namespace Modules\Auth\Services;

use App\Models\User;


/**
 * Class RoleChecker
 * @package App\Role
 */
class RoleChecker
{
    /**
     * @param User $user
     * @param string $role
     * @return bool
     */
    public function check(User $user, string $role)
    {
        // Admin has everything
        if ($user->hasRole(UserRole::ROLE_ADMIN)) {
            return true;
        } else if ($user->hasRole(UserRole::ROLE_REDACTOR)) {
            $redactorRoles = UserRole::getAllowedRoles(UserRole::ROLE_REDACTOR);

            // Checks if a value is present in the array
            if (in_array($role, $redactorRoles)) {
                return true;
            }
        }

        return $user->hasRole($role);
    }
}
