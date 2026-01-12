<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Featured_medicine;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Featured_medicineTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/featured_medicines';
    protected string $tableName = 'featured_medicines';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateFeatured_medicine(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = Featured_medicine::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllFeatured_medicinesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Featured_medicine::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(Featured_medicine::find(rand(1, 5))->name);
    }

    public function testViewAllFeatured_medicinesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Featured_medicine::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateFeatured_medicineValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewFeatured_medicineData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Featured_medicine::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(Featured_medicine::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateFeatured_medicine(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Featured_medicine::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteFeatured_medicine(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Featured_medicine::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, Featured_medicine::count());
    }
    
}
