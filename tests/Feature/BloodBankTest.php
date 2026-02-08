<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\BloodBank;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BloodBankTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/bloodBanks';
    protected string $tableName = 'bloodBanks';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateBloodBank(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = BloodBank::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllBloodBanksSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        BloodBank::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(BloodBank::find(rand(1, 5))->name);
    }

    public function testViewAllBloodBanksByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        BloodBank::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateBloodBankValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewBloodBankData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        BloodBank::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(BloodBank::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateBloodBank(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        BloodBank::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteBloodBank(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        BloodBank::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, BloodBank::count());
    }
    
}
