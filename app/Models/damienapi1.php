<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="damienapi1",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="es_cluster",
 *          description="es_cluster",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="logify_name",
 *          description="logify_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="VIP",
 *          description="VIP",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="public_ip ",
 *          description="public_ip ",
 *          type="string"
 *      )
 * )
 */
class damienapi1 extends Model
{
    use SoftDeletes;

    public $table = 'damienapi1s';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'es_cluster',
        'logify_name',
        'VIP',
        'public_ip '
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'es_cluster' => 'string',
        'logify_name' => 'string',
        'VIP' => 'string',
        'public_ip ' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
