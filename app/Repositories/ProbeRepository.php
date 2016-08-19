<?php

namespace App\Repositories;

use App\Models\Probe;
use InfyOm\Generator\Common\BaseRepository;

class ProbeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'Ip',
        'Input',
        'FIlter',
        'Output'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Probe::class;
    }
}
