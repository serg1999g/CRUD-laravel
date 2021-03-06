<?php

namespace Modules\Auth\Services;


/**
 * The class will contain the roles that the user can have and their hierarchy.
 *
 * Class UserRole
 * @package App\Role
 */
class UserRole
{

    const ROLE_ADMIN = 'admin';
    const ROLE_REDACTOR = 'redactor';
    const ROLE_USER = 'user';

    protected static $roleHierarchy = [
        self::ROLE_ADMIN => ['*'],
        self::ROLE_REDACTOR => [
            self::ROLE_USER,
        ],
        self::ROLE_USER => [],
    ];


    /**
     * get Allowed Roles
     *
     * @param $role
     * @return array|mixed
     */
    public static function getAllowedRoles(string $role)
    {
        if (isset(self::$roleHierarchy[$role])) {
            return self::$roleHierarchy[$role];
        }

        return [];
    }
}
