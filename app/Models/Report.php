<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Report",
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
 *          property="Schedule",
 *          description="Schedule",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Dashboard",
 *          description="Dashboard",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Email",
 *          description="Email",
 *          type="string"
 *      )
 * )
 */
class Report extends Model
{
    use SoftDeletes;

    public $table = 'reports';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Name',
        'Schedule',
        'Dashboard',
        'Email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string',
        'Schedule' => 'string',
        'Dashboard' => 'string',
        'Email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
