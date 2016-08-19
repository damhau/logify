<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class provisionApiTest extends TestCase
{
    use MakeprovisionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateprovision()
    {
        $provision = $this->fakeprovisionData();
        $this->json('POST', '/api/v1/provisions', $provision);

        $this->assertApiResponse($provision);
    }

    /**
     * @test
     */
    public function testReadprovision()
    {
        $provision = $this->makeprovision();
        $this->json('GET', '/api/v1/provisions/'.$provision->id);

        $this->assertApiResponse($provision->toArray());
    }

    /**
     * @test
     */
    public function testUpdateprovision()
    {
        $provision = $this->makeprovision();
        $editedprovision = $this->fakeprovisionData();

        $this->json('PUT', '/api/v1/provisions/'.$provision->id, $editedprovision);

        $this->assertApiResponse($editedprovision);
    }

    /**
     * @test
     */
    public function testDeleteprovision()
    {
        $provision = $this->makeprovision();
        $this->json('DELETE', '/api/v1/provisions/'.$provision->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/provisions/'.$provision->id);

        $this->assertResponseStatus(404);
    }
}
