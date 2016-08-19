<?php

use App\Models\logify_provision;
use App\Repositories\logify_provisionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class logify_provisionRepositoryTest extends TestCase
{
    use Makelogify_provisionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var logify_provisionRepository
     */
    protected $logifyProvisionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->logifyProvisionRepo = App::make(logify_provisionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatelogify_provision()
    {
        $logifyProvision = $this->fakelogify_provisionData();
        $createdlogify_provision = $this->logifyProvisionRepo->create($logifyProvision);
        $createdlogify_provision = $createdlogify_provision->toArray();
        $this->assertArrayHasKey('id', $createdlogify_provision);
        $this->assertNotNull($createdlogify_provision['id'], 'Created logify_provision must have id specified');
        $this->assertNotNull(logify_provision::find($createdlogify_provision['id']), 'logify_provision with given id must be in DB');
        $this->assertModelData($logifyProvision, $createdlogify_provision);
    }

    /**
     * @test read
     */
    public function testReadlogify_provision()
    {
        $logifyProvision = $this->makelogify_provision();
        $dblogify_provision = $this->logifyProvisionRepo->find($logifyProvision->id);
        $dblogify_provision = $dblogify_provision->toArray();
        $this->assertModelData($logifyProvision->toArray(), $dblogify_provision);
    }

    /**
     * @test update
     */
    public function testUpdatelogify_provision()
    {
        $logifyProvision = $this->makelogify_provision();
        $fakelogify_provision = $this->fakelogify_provisionData();
        $updatedlogify_provision = $this->logifyProvisionRepo->update($fakelogify_provision, $logifyProvision->id);
        $this->assertModelData($fakelogify_provision, $updatedlogify_provision->toArray());
        $dblogify_provision = $this->logifyProvisionRepo->find($logifyProvision->id);
        $this->assertModelData($fakelogify_provision, $dblogify_provision->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletelogify_provision()
    {
        $logifyProvision = $this->makelogify_provision();
        $resp = $this->logifyProvisionRepo->delete($logifyProvision->id);
        $this->assertTrue($resp);
        $this->assertNull(logify_provision::find($logifyProvision->id), 'logify_provision should not exist in DB');
    }
}
