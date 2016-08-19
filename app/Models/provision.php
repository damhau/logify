<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="provision",
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
 *          property="ip_public",
 *          description="ip_public",
 *          type="string"
 *      )
 * )
 */
class provision extends Model
{
    use SoftDeletes;

    public $table = 'provisions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'es_cluster',
        'logify_name',
        'VIP',
        'ip_public'
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
        'ip_public' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
