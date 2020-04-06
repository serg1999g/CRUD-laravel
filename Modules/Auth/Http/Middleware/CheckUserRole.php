<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Services\RoleChecker;

/**
 * Class CheckUserRole
 * @package App\Http\Middleware
 */
class CheckUserRole
{
    /**
     * @var RoleChecker
     */
    protected $roleChecker;

    /**
     * CheckUserRole constructor.
     * @param RoleChecker $roleChecker
     */
    public function __construct(RoleChecker $roleChecker)
    {
        $this->roleChecker = $roleChecker;
    }

    public function handle($request, Closure $next, $role)
    {
        $user = Auth::guard()->user();

        if (!$this->roleChecker->check($user, $role)) {
            throw new AuthorizationException('You do not have permission to view this page');
        }

        return $next($request);
    }
}
