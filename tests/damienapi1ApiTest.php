<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class damienapi1ApiTest extends TestCase
{
    use Makedamienapi1Trait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedamienapi1()
    {
        $damienapi1 = $this->fakedamienapi1Data();
        $this->json('POST', '/api/v1/damienapi1s', $damienapi1);

        $this->assertApiResponse($damienapi1);
    }

    /**
     * @test
     */
    public function testReaddamienapi1()
    {
        $damienapi1 = $this->makedamienapi1();
        $this->json('GET', '/api/v1/damienapi1s/'.$damienapi1->id);

        $this->assertApiResponse($damienapi1->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedamienapi1()
    {
        $damienapi1 = $this->makedamienapi1();
        $editeddamienapi1 = $this->fakedamienapi1Data();

        $this->json('PUT', '/api/v1/damienapi1s/'.$damienapi1->id, $editeddamienapi1);

        $this->assertApiResponse($editeddamienapi1);
    }

    /**
     * @test
     */
    public function testDeletedamienapi1()
    {
        $damienapi1 = $this->makedamienapi1();
        $this->json('DELETE', '/api/v1/damienapi1s/'.$damienapi1->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/damienapi1s/'.$damienapi1->id);

        $this->assertResponseStatus(404);
    }
}
