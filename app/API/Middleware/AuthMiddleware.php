<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 03/03/18
 * Time: 06:29 م
 */

namespace App\API\Middleware;


class AuthMiddleware extends Middleware
{
    /**
     * middleware checks if the user is signed or no
     * @param $Request
     * @param $Response
     * @param $next
     * @return mixed
     */
    public function __invoke($Request,$Response,$next)
    {
        if (!$this->Auth->check()){
            $response['errors'] = 'Please sign in before doing that.';
            $response['status'] = 'failed';
            return $Response->withJson($response,400);
        }

        $Response = $next($Request,$Response);
        return $Response;
    }
}