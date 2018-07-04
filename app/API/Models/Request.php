<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 22/04/18
 * Time: 07:58 ص
 */

namespace App\API\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Request retrieve requests
 * @package App\API\Models
 */
class Request extends Model
{
    //'Name', 'quantity', 'SuggetedPrice', 'Image', 'User_ID'
    protected $fillable=[
        'Name', 'quantity', 'SuggetedPrice', 'Image', 'User_ID'
    ];
    public function Companies(){
        return $this->belongsToMany("App\API\Models\Company","company_requests",'Request_ID','Company_ID');
    }
    public function user(){
 		return $this->belongsTo('App\API\Models\User');
     }
}