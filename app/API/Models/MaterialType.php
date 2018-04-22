<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 22/04/18
 * Time: 09:31 ص
 */

namespace App\API\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MaterialTypeController to retrieve materials
 * @package App\API\Models
 */
class MaterialType extends Model
{
    protected $fillable = [
        'Name','Type','measurement'
    ];
}