<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="logify_provision",
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
class logify_provision extends Model
{
    use SoftDeletes;

    public $table = 'logify_provisions';
    

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
