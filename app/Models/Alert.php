<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use HipsterJazzbo\Landlord\BelongsToTenant;

/**
 * @SWG\Definition(
 *      definition="Alert",
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
 *          property="Index",
 *          description="Index",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Type",
 *          description="Type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Alert",
 *          description="Alert",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Query_key",
 *          description="Query_key",
 *          type="string"
 *      )
 * )
 */
class Alert extends Model
{
    use SoftDeletes;
    use BelongsToTenant;
    public $table = 'alerts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Name',
        'Index',
        'Type',
        'Alert',
        'Query_key'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string',
        'Index' => 'string',
        'Type' => 'string',
        'Alert' => 'string',
        'Query_key' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
