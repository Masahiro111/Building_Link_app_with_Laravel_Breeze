<?php

namespace Tests\Feature;

use App\Models\Link;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LinkTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->link = Link::factory()->ofUser($this->user)->create();
    }


    function link_creation_page_contains_livewire_component()
    {
        $this->actingAs($this->user)
            ->get(route('links.create'))
            ->assertSeeLivewire('create-link');
    }
}
