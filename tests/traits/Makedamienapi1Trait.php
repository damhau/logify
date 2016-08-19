<?php

use Faker\Factory as Faker;
use App\Models\damienapi1;
use App\Repositories\damienapi1Repository;

trait Makedamienapi1Trait
{
    /**
     * Create fake instance of damienapi1 and save it in database
     *
     * @param array $damienapi1Fields
     * @return damienapi1
     */
    public function makedamienapi1($damienapi1Fields = [])
    {
        /** @var damienapi1Repository $damienapi1Repo */
        $damienapi1Repo = App::make(damienapi1Repository::class);
        $theme = $this->fakedamienapi1Data($damienapi1Fields);
        return $damienapi1Repo->create($theme);
    }

    /**
     * Get fake instance of damienapi1
     *
     * @param array $damienapi1Fields
     * @return damienapi1
     */
    public function fakedamienapi1($damienapi1Fields = [])
    {
        return new damienapi1($this->fakedamienapi1Data($damienapi1Fields));
    }

    /**
     * Get fake data of damienapi1
     *
     * @param array $postFields
     * @return array
     */
    public function fakedamienapi1Data($damienapi1Fields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'es_cluster' => $fake->text,
            'logify_name' => $fake->text,
            'VIP' => $fake->text,
            'public_ip ' => $fake->text
        ], $damienapi1Fields);
    }
}
