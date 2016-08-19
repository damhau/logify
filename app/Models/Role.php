<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Role",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Name",
 *          description="Name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Indices",
 *          description="Indices",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Permissions",
 *          description="Permissions",
 *          type="string"
 *      )
 * )
 */
class Role extends Model
{
    use SoftDeletes;

    public $table = 'roles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Name',
        'Indices',
        'Permissions'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string',
        'Indices' => 'string',
        'Permissions' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
