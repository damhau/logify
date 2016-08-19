<?php

use App\Models\damienapi1;
use App\Repositories\damienapi1Repository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class damienapi1RepositoryTest extends TestCase
{
    use Makedamienapi1Trait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var damienapi1Repository
     */
    protected $damienapi1Repo;

    public function setUp()
    {
        parent::setUp();
        $this->damienapi1Repo = App::make(damienapi1Repository::class);
    }

    /**
     * @test create
     */
    public function testCreatedamienapi1()
    {
        $damienapi1 = $this->fakedamienapi1Data();
        $createddamienapi1 = $this->damienapi1Repo->create($damienapi1);
        $createddamienapi1 = $createddamienapi1->toArray();
        $this->assertArrayHasKey('id', $createddamienapi1);
        $this->assertNotNull($createddamienapi1['id'], 'Created damienapi1 must have id specified');
        $this->assertNotNull(damienapi1::find($createddamienapi1['id']), 'damienapi1 with given id must be in DB');
        $this->assertModelData($damienapi1, $createddamienapi1);
    }

    /**
     * @test read
     */
    public function testReaddamienapi1()
    {
        $damienapi1 = $this->makedamienapi1();
        $dbdamienapi1 = $this->damienapi1Repo->find($damienapi1->id);
        $dbdamienapi1 = $dbdamienapi1->toArray();
        $this->assertModelData($damienapi1->toArray(), $dbdamienapi1);
    }

    /**
     * @test update
     */
    public function testUpdatedamienapi1()
    {
        $damienapi1 = $this->makedamienapi1();
        $fakedamienapi1 = $this->fakedamienapi1Data();
        $updateddamienapi1 = $this->damienapi1Repo->update($fakedamienapi1, $damienapi1->id);
        $this->assertModelData($fakedamienapi1, $updateddamienapi1->toArray());
        $dbdamienapi1 = $this->damienapi1Repo->find($damienapi1->id);
        $this->assertModelData($fakedamienapi1, $dbdamienapi1->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedamienapi1()
    {
        $damienapi1 = $this->makedamienapi1();
        $resp = $this->damienapi1Repo->delete($damienapi1->id);
        $this->assertTrue($resp);
        $this->assertNull(damienapi1::find($damienapi1->id), 'damienapi1 should not exist in DB');
    }
}
