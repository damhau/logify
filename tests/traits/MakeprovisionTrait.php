<?php

use Faker\Factory as Faker;
use App\Models\provision;
use App\Repositories\provisionRepository;

trait MakeprovisionTrait
{
    /**
     * Create fake instance of provision and save it in database
     *
     * @param array $provisionFields
     * @return provision
     */
    public function makeprovision($provisionFields = [])
    {
        /** @var provisionRepository $provisionRepo */
        $provisionRepo = App::make(provisionRepository::class);
        $theme = $this->fakeprovisionData($provisionFields);
        return $provisionRepo->create($theme);
    }

    /**
     * Get fake instance of provision
     *
     * @param array $provisionFields
     * @return provision
     */
    public function fakeprovision($provisionFields = [])
    {
        return new provision($this->fakeprovisionData($provisionFields));
    }

    /**
     * Get fake data of provision
     *
     * @param array $postFields
     * @return array
     */
    public function fakeprovisionData($provisionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'es_cluster' => $fake->text,
            'logify_name' => $fake->text,
            'VIP' => $fake->text,
            'ip_public' => $fake->text
        ], $provisionFields);
    }
}
