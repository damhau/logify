<?php

use Faker\Factory as Faker;
use App\Models\logify_provision;
use App\Repositories\logify_provisionRepository;

trait Makelogify_provisionTrait
{
    /**
     * Create fake instance of logify_provision and save it in database
     *
     * @param array $logifyProvisionFields
     * @return logify_provision
     */
    public function makelogify_provision($logifyProvisionFields = [])
    {
        /** @var logify_provisionRepository $logifyProvisionRepo */
        $logifyProvisionRepo = App::make(logify_provisionRepository::class);
        $theme = $this->fakelogify_provisionData($logifyProvisionFields);
        return $logifyProvisionRepo->create($theme);
    }

    /**
     * Get fake instance of logify_provision
     *
     * @param array $logifyProvisionFields
     * @return logify_provision
     */
    public function fakelogify_provision($logifyProvisionFields = [])
    {
        return new logify_provision($this->fakelogify_provisionData($logifyProvisionFields));
    }

    /**
     * Get fake data of logify_provision
     *
     * @param array $postFields
     * @return array
     */
    public function fakelogify_provisionData($logifyProvisionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'es_cluster' => $fake->text,
            'logify_name' => $fake->text,
            'VIP' => $fake->text,
            'public_ip ' => $fake->text
        ], $logifyProvisionFields);
    }
}
