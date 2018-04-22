<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 22/04/18
 * Time: 12:11 م
 */

namespace App\API\Models;

use Illuminate\Database\Eloquent\Model;
class RequestMaterial extends Model
{
    protected $fillable = [
        'Request_ID','Material_ID'
    ];
}