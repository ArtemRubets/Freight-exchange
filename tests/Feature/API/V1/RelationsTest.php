<?php

namespace Tests\Feature\API\V1;

use App\Models\Load;
use App\Models\Point;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RelationsTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_load_has_a_point()
    {
        $load = Load::factory()->has(Point::factory())->create();

        $this->assertNotNull($load->point);
    }

    public function test_a_load_has_not_a_point()
    {
        $load = Load::factory()->create();

        $this->assertNull($load->point);
    }

    public function test_a_point_has_a_load()
    {
        $load = Load::factory()->create();
        $point = Point::factory()->create(['load_id' => $load->id]);

        $this->assertNotNull($point->pointLoad);
    }
}
