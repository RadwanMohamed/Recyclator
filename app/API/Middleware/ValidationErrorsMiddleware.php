<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 03/03/18
 * Time: 02:48 م
 */

namespace App\API\Middleware;



class ValidationErrorsMiddleware extends Middleware
{
    /**
     * middleware checks  if there are errors to return it
     * @param $Request
     * @param $Response
     * @param $next
     * @return mixed
     */
    public function __invoke($Request,$Response,$next)
    {
        $Response = $next($Request,$Response);
        if ($this->checkerrors()){
            $Response = $next($Request,$Response);
            return $Response;
        }
        $response['errors'] = $_SESSION['errors'];
        $response['status'] = 'failed';
        $this->removeErrors();
        return $Response->withJson($response,400);
    }

    /**
     * check if there errors or not
     * @return bool
     */
    private function checkerrors(){
        return ($_SESSION['errors'] == null);
    }
    /*
     * remove errors from sessions after take it
     */
    private function removeErrors(){
        unset($_SESSION['errors']);
    }
}

