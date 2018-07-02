<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 04/03/18
 * Time: 10:43 ص
 */

namespace App\API\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyController model
 * @package App\API\Models
 */
class Company extends Model
{

    //`Name`, `Email`, `Phone`, `Bio`, `Password`, `District`, `Image`, `HashTable`, `LocationTarget`
    protected $fillable =[
        'Name','Email','Phone','Bio','Password','District','Image','district','LocationTarget','height','width','rate'
    ];
    public function requests()
    {
        return $this->belongsToMany("App\API\Models\Request","company_requests");

    }

}