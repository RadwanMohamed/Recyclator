<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 03/03/18
 * Time: 06:40 م
 */

namespace App\API\Middleware;


class GuestMiddleware
{
    public function __invoke($Request,$Response,$next)
    {
        $Response = $next($Request,$Response);
        return $Response;
    }

}