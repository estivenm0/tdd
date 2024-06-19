<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReadEventTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_can_display_events(): void
    {
        Event::create([
            'name'=> 'example',
            'featured'=> 'example.jpg',
            'location'=> 'en algún lugar',
            'date'=> now(),
            'time'=> '12:00:00',
        ]);
        Event::create([
            'name'=> 'example2',
            'featured'=> 'example.jpg',
            'location'=> 'en algún lugar',
            'date'=> now(),
            'time'=> '12:00:00',
        ]);

        $r = $this->get('/events');

        $r->assertStatus(200);

        $r->assertSee('example' );
        $r->assertSee('example2' );
    }
}
