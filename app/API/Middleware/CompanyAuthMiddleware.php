<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 04/03/18
 * Time: 11:40 ص
 */

namespace App\API\Middleware;


class CompanyAuthMiddleware extends Middleware
{
    /**
     * middleware checks if the company is signed or no
     * @param $Request
     * @param $Response
     * @param $next
     * @return mixed
     */
    public function __invoke($Request,$Response,$next)
    {
        if (!$this->Auth->companyCheck()){
            $response['errors'] = 'Please sign in before doing that.';
            $response['status'] = 'failed';
            return $Response->withJson($response,400);
        }
        $Response = $next($Request,$Response);
        return $Response;
    }
}