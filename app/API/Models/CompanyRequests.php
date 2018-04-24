<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 22/04/18
 * Time: 02:56 م
 */

namespace App\API\Models;
use Illuminate\Database\Eloquent\Model;

class CompanyRequests extends Model
{
    protected $fillable = [
        'Status','Request_ID','Company_ID'
    ];

}