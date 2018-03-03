<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 28/02/18
 * Time: 03:08 م
 */

namespace App\API\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //`FirstName`, `LastName`, `Email`, `Phone`, `Password`, `Image`, `district`, `HashTable`
    protected $fillable =[
        'FirstName','LastName','Email','Phone','Password','Image','district'
    ];
}