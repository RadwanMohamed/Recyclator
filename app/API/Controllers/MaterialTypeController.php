<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 22/04/18
 * Time: 09:50 ص
 */

namespace App\API\Controllers;

use App\API\Models\MaterialType;
class MaterialTypeController extends Controller
{
    /**
     * return all materials that are available in DB
     * @param $Response
     * @return mixed
     */
    public function index($Request,$Response){
        $materials = MaterialType::all();
        return $Response->withJson($materials);
    }

    /**
     * function to insert material in database
     * @param $Request
     * @param $Response
     * @return mixed
     */
    public function create($Request,$Response){
        $validation = $this->MaterialTypeValidation->validateMaterial($Request);
        if (!$validation->failed()){
            $material = MaterialType::create([
               'Name' => $Request->getParam('Name'),
               'Type' => $Request->getParam('Type'),
               'measurement' => $Request->getParam('measurement')
            ]);
            if ($material){
                $response['message'] = "the material is stored";
                $response['status'] = 'success';
                return $Response->withJson($response, 200);
            }else{
                $response['message'] = "something is wrong";
                $response['status'] = 'failed';
                return $Response->withJson($response, 422);
            }
        }
    }


}



