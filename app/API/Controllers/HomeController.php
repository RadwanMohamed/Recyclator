<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 28/02/18
 * Time: 11:55 ص
 */

namespace App\API\Controllers;


use App\API\Models\User;

class HomeController extends Controller
{
    public function index(){
        echo "Home";
    }
}