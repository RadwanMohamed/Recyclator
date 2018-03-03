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
        //var_dump($_SESSION);
        $Response = $next($Request,$Response);
        $response['errors'] = $_SESSION['errors'];
        $this->removeErrors();

        return $Response->withJson($response);
    }

    /**
     * check if there errors or not
     * @return bool
     */
    private function checkerrors(){
        return !isset($_SESSION['errors']);
    }
    /*
     * remove errors from sessions after take it
     */
    private function removeErrors(){
        unset($_SESSION['errors']);
    }
}

/**
 * {

"FirstName": "omarfffffahoofffcom",
"LastName": "fhffh",
"Phone": "012011478",
"Image": "Image",
"district": "omarfffffcom",
"Email": "omarfffff@yahoofff.com",
"Password": "123456"
}
 */