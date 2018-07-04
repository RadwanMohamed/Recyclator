<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 28/02/18
 * Time: 03:08 م
 */

namespace App\API\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User model
 * @package App\API\Models
 */
class User extends Model
{
    /**
     * @var array
     */
    protected $fillable =[
        'FirstName','LastName','Email','Phone','Password','Image','district','width','height','rate'
    ];
    public function request(){
 		return $this->hasMany('App\API\Models\Request');
     }
}