<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateEventTest extends TestCase
{
    // use RefreshDatabase;

    protected $event;
    /**
     * A basic feature test example.
     */

     public function setUp(): void {
        parent::setUp();

        $this->event = Event::create([
            'name'=> 'example',
            'featured'=> 'example.jpg',
            'location'=> 'en algún lugar',
            'date'=> now(),
            'time'=> '12:00:00',
        ]);
     }

    public function test_can_update_event(): void
    {
        $updateData = ['name'=> 'evento actualizado'];
        $r = $this->put('/events/'. $this->event->id, $updateData );

        $r->assertStatus(200);

        $this->assertDatabaseHas('events', $updateData);
    }
}
