<?php

use App\Models\Lugares;
use App\Repositories\LugaresRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LugaresRepositoryTest extends TestCase
{
    use MakeLugaresTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LugaresRepository
     */
    protected $lugaresRepo;

    public function setUp()
    {
        parent::setUp();
        $this->lugaresRepo = App::make(LugaresRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLugares()
    {
        $lugares = $this->fakeLugaresData();
        $createdLugares = $this->lugaresRepo->create($lugares);
        $createdLugares = $createdLugares->toArray();
        $this->assertArrayHasKey('id', $createdLugares);
        $this->assertNotNull($createdLugares['id'], 'Created Lugares must have id specified');
        $this->assertNotNull(Lugares::find($createdLugares['id']), 'Lugares with given id must be in DB');
        $this->assertModelData($lugares, $createdLugares);
    }

    /**
     * @test read
     */
    public function testReadLugares()
    {
        $lugares = $this->makeLugares();
        $dbLugares = $this->lugaresRepo->find($lugares->id);
        $dbLugares = $dbLugares->toArray();
        $this->assertModelData($lugares->toArray(), $dbLugares);
    }

    /**
     * @test update
     */
    public function testUpdateLugares()
    {
        $lugares = $this->makeLugares();
        $fakeLugares = $this->fakeLugaresData();
        $updatedLugares = $this->lugaresRepo->update($fakeLugares, $lugares->id);
        $this->assertModelData($fakeLugares, $updatedLugares->toArray());
        $dbLugares = $this->lugaresRepo->find($lugares->id);
        $this->assertModelData($fakeLugares, $dbLugares->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLugares()
    {
        $lugares = $this->makeLugares();
        $resp = $this->lugaresRepo->delete($lugares->id);
        $this->assertTrue($resp);
        $this->assertNull(Lugares::find($lugares->id), 'Lugares should not exist in DB');
    }
}
