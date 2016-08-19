<?php

namespace App\Repositories;

use App\Models\damienapi1;
use InfyOm\Generator\Common\BaseRepository;

class damienapi1Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'es_cluster',
        'logify_name',
        'VIP',
        'public_ip '
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return damienapi1::class;
    }
}
