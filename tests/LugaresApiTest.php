<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LugaresApiTest extends TestCase
{
    use MakeLugaresTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLugares()
    {
        $lugares = $this->fakeLugaresData();
        $this->json('POST', '/api/v1/lugares', $lugares);

        $this->assertApiResponse($lugares);
    }

    /**
     * @test
     */
    public function testReadLugares()
    {
        $lugares = $this->makeLugares();
        $this->json('GET', '/api/v1/lugares/'.$lugares->id);

        $this->assertApiResponse($lugares->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLugares()
    {
        $lugares = $this->makeLugares();
        $editedLugares = $this->fakeLugaresData();

        $this->json('PUT', '/api/v1/lugares/'.$lugares->id, $editedLugares);

        $this->assertApiResponse($editedLugares);
    }

    /**
     * @test
     */
    public function testDeleteLugares()
    {
        $lugares = $this->makeLugares();
        $this->json('DELETE', '/api/v1/lugares/'.$lugares->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/lugares/'.$lugares->id);

        $this->assertResponseStatus(404);
    }
}
