<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="User",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Username",
 *          description="Username",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Password",
 *          description="Password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Roles",
 *          description="Roles",
 *          type="string"
 *      )
 * )
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'logify_users';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Username',
        'Password',
        'Roles'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Username' => 'string',
        'Password' => 'string',
        'Roles' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
