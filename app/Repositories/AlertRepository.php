<?php

namespace App\Repositories;

use App\Models\Alert;
use InfyOm\Generator\Common\BaseRepository;

class AlertRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'Index',
        'Type',
        'Alert',
        'Query_key'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Alert::class;
    }
}
