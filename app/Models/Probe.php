<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Probe",
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
 *          property="Ip",
 *          description="Ip",
 *          type="string"
 *      )
 * )
 */
class Probe extends Model
{
    use SoftDeletes;

    public $table = 'probes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Name',
        'Ip',
        'Input',
        'FIlter',
        'Output'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string',
        'Ip' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
