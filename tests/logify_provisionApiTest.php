<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class logify_provisionApiTest extends TestCase
{
    use Makelogify_provisionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatelogify_provision()
    {
        $logifyProvision = $this->fakelogify_provisionData();
        $this->json('POST', '/api/v1/logifyProvisions', $logifyProvision);

        $this->assertApiResponse($logifyProvision);
    }

    /**
     * @test
     */
    public function testReadlogify_provision()
    {
        $logifyProvision = $this->makelogify_provision();
        $this->json('GET', '/api/v1/logifyProvisions/'.$logifyProvision->id);

        $this->assertApiResponse($logifyProvision->toArray());
    }

    /**
     * @test
     */
    public function testUpdatelogify_provision()
    {
        $logifyProvision = $this->makelogify_provision();
        $editedlogify_provision = $this->fakelogify_provisionData();

        $this->json('PUT', '/api/v1/logifyProvisions/'.$logifyProvision->id, $editedlogify_provision);

        $this->assertApiResponse($editedlogify_provision);
    }

    /**
     * @test
     */
    public function testDeletelogify_provision()
    {
        $logifyProvision = $this->makelogify_provision();
        $this->json('DELETE', '/api/v1/logifyProvisions/'.$logifyProvision->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/logifyProvisions/'.$logifyProvision->id);

        $this->assertResponseStatus(404);
    }
}
