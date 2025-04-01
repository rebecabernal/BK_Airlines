<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\User;
use App\Models\Plane;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlaneControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_index_returns_all_planes()
    {
        Plane::factory()->count(3)->create();

        $response = $this->getJson(route('apiplaneall'));

        $response->assertOk()
                 ->assertJsonCount(3);
    }

    public function test_if_show_returns_a_plane()
    {
        $plane = Plane::factory()->create();

        $response = $this->getJson(route('apiplaneshow', $plane->id));

        $response->assertOk()
                 ->assertJsonFragment([
                     'id' => $plane->id,
                     'name' => $plane->name,
                 ]);
    }

    public function test_if_admin_can_store_plane()
    {
        $admin = User::factory()->create(['isAdmin' => true]);

        $data = [
            'name' => 'Airbus A320',
            'seats' => 180
        ];

        $response = $this->actingAs($admin, 'api')
                         ->postJson(route('apiplanestore'), $data);

        $response->assertOk()
                 ->assertJsonFragment(['name' => 'Airbus A320']);

        $this->assertDatabaseHas('planes', ['name' => 'Airbus A320']);
    }

    public function test_if_admin_can_update_plane()
    {
        $admin = User::factory()->create(['isAdmin' => true]);
        $plane = Plane::factory()->create();

        $data = [
            'name' => 'Boeing 777',
            'seats' => 300
        ];

        $response = $this->actingAs($admin, 'api')
                         ->putJson(route('apiplaneupdate', $plane->id), $data);

        $response->assertOk()
                 ->assertJsonFragment(['name' => 'Boeing 777']);

        $this->assertDatabaseHas('planes', ['seats' => 300]);
    }

    public function test_if_admin_can_delete_plane()
    {
        $admin = User::factory()->create(['isAdmin' => true]);
        $plane = Plane::factory()->create();

        $response = $this->actingAs($admin, 'api')
                         ->deleteJson(route('apiplanedestroy', $plane->id));

        $response->assertOk();

        $this->assertDatabaseMissing('planes', ['id' => $plane->id]);
    }

    public function test_if_non_admin_cannot_store_plane()
    {
        $user = User::factory()->create(['isAdmin' => false]);

        $data = [
            'name' => 'Embraer 190',
            'seats' => 100
        ];

        $response = $this->actingAs($user, 'api')
                         ->postJson(route('apiplanestore'), $data);

        $response->assertRedirect('/');
    }
}
