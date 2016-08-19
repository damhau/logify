<?php

namespace App\Repositories;

use App\Models\logify_provision;
use InfyOm\Generator\Common\BaseRepository;

class logify_provisionRepository extends BaseRepository
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
        return logify_provision::class;
    }
}
