<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Promotional_banner;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Promotional_bannerTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/promotional_banners';
    protected string $tableName = 'promotional_banners';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreatePromotional_banner(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = Promotional_banner::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllPromotional_bannersSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Promotional_banner::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(Promotional_banner::find(rand(1, 5))->name);
    }

    public function testViewAllPromotional_bannersByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Promotional_banner::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreatePromotional_bannerValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewPromotional_bannerData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Promotional_banner::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(Promotional_banner::first()->name)
             ->assertStatus(200);
    }

    public function testUpdatePromotional_banner(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Promotional_banner::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeletePromotional_banner(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Promotional_banner::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, Promotional_banner::count());
    }
    
}
