<?php

namespace Tests\Feature\API\V1;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateLoadTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_load_successful()
    {
        $response = $this->postJson(route('loads.create'), [
            'load_name' => 'Олія',
            'from' => 'Львів',
            'to' => 'Харків',
            'date_picker' => now()->addDay('3')->format('Y-m-d'),
            'weight' => 10.5
        ]);

        $response->assertValid()->assertCreated();
    }

    public function test_get_created_load_correct_responce_data()
    {
        $inputData = [
            'load_name' => 'Олія',
            'from' => 'Львів',
            'to' => 'Харків',
            'date_picker' => now()->addDay('3')->format('Y-m-d'),
            'weight' => 10.5
        ];

        $response = $this->postJson(route('loads.create'), $inputData);

        $response->assertJsonFragment([
            'name' => 'Олія',
            'from' => 'Львів',
            'to' => 'Харків',
            'date' => now()->addDay('3')->format('d.m'),
            'weight' => 10.5
        ]);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'weight',
                'point' => [
                    'from',
                    'to',
                    'date'
                ],
                'created_at'
            ]
        ]);
    }

    public function test_create_load_failed()
    {
        $response = $this->postJson(route('loads.create'), [
            'load_name' => '35',
            'from' => '',
            'to' => 'Харків',
            'date_picker' => Carbon::yesterday()->format('d-m-Y'),
            'weight' => 99999
        ]);

        $response->assertInvalid(['load_name', 'from','date_picker', 'weight'])
            ->assertStatus(422)->assertJsonStructure([
                'message',
                'errors'
            ]);
    }

}
