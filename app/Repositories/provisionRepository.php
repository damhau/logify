<?php

namespace App\Repositories;

use App\Models\provision;
use InfyOm\Generator\Common\BaseRepository;

class provisionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'es_cluster',
        'logify_name',
        'VIP',
        'ip_public'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return provision::class;
    }
}
