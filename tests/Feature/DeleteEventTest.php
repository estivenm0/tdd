<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteEventTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_delete_event(): void
    {
        $event = Event::create([
            'name'=> 'delete',
            'featured'=> 'example.jpg',
            'location'=> 'en algún lugar',
            'date'=> now(),
            'time'=> '12:00:00',
        ]);

        $r = $this->delete('/events/'. $event->id);

        $r->assertStatus(204);
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
}
