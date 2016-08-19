<?php

use App\Models\provision;
use App\Repositories\provisionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class provisionRepositoryTest extends TestCase
{
    use MakeprovisionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var provisionRepository
     */
    protected $provisionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->provisionRepo = App::make(provisionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateprovision()
    {
        $provision = $this->fakeprovisionData();
        $createdprovision = $this->provisionRepo->create($provision);
        $createdprovision = $createdprovision->toArray();
        $this->assertArrayHasKey('id', $createdprovision);
        $this->assertNotNull($createdprovision['id'], 'Created provision must have id specified');
        $this->assertNotNull(provision::find($createdprovision['id']), 'provision with given id must be in DB');
        $this->assertModelData($provision, $createdprovision);
    }

    /**
     * @test read
     */
    public function testReadprovision()
    {
        $provision = $this->makeprovision();
        $dbprovision = $this->provisionRepo->find($provision->id);
        $dbprovision = $dbprovision->toArray();
        $this->assertModelData($provision->toArray(), $dbprovision);
    }

    /**
     * @test update
     */
    public function testUpdateprovision()
    {
        $provision = $this->makeprovision();
        $fakeprovision = $this->fakeprovisionData();
        $updatedprovision = $this->provisionRepo->update($fakeprovision, $provision->id);
        $this->assertModelData($fakeprovision, $updatedprovision->toArray());
        $dbprovision = $this->provisionRepo->find($provision->id);
        $this->assertModelData($fakeprovision, $dbprovision->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteprovision()
    {
        $provision = $this->makeprovision();
        $resp = $this->provisionRepo->delete($provision->id);
        $this->assertTrue($resp);
        $this->assertNull(provision::find($provision->id), 'provision should not exist in DB');
    }
}
