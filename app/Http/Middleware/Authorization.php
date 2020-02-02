<?php

namespace App\Http\Middleware;

use Blog\Entities\User;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class Authorization
{
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = Auth()->user();

        $roles = $user->getRoles()->getValues();

        if (empty($roles)) {
            throw new AuthorizationException();
        }

        return $next($request);
    }
}
