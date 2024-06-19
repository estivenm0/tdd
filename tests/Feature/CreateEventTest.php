<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateEventTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_an_event_can_be_created(): void
    {
        $event = [
            'name'=> 'example',
            'featured'=> 'example.jpg',
            'location'=> 'en algún lugar',
            'date'=> now(),
            'time'=> '12:00:00',
        ];

        $r = $this->post('/events', $event);

        $r->assertStatus(302);

        $this->assertDatabaseHas('events', $event);
    }
}
