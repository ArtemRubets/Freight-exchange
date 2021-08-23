<?php

namespace Tests\Feature\API\V1;

use App\Models\Load;
use App\Models\Point;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetLoadsTest extends TestCase
{

    use RefreshDatabase;

    private $loads;

    public function setUp(): void
    {
        parent::setUp();

        $this->loads = Load::factory()->count(20)->has(Point::factory())->create();
    }

    public function test_get_loads()
    {
        $response = $this->getJson(route('loads.get'));
        $response->assertOk();
    }

    public function test_valid_loads_data()
    {
        $loadsIds = $this->loads->pluck('id')->toArray();

        $response = $this->get(route('loads.get'));

        $data = (collect(json_decode($response->getContent())))['data'];
        $dataIds = collect($data)->pluck('id')->toArray();

        $this->assertTrue(count($loadsIds) == count($dataIds));

        foreach ($loadsIds as $loadsId) {
            $this->assertTrue(in_array($loadsId, $dataIds));
        }
    }

    public function test_loads_data_is_collection()
    {
        $this->assertInstanceOf(Collection::class, $this->loads);
    }

    public function test_not_found()
    {
        $response = $this->getJson('/api/V1/update');
        $response->assertNotFound();
    }
}
