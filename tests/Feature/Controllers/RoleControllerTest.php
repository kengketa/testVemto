<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Role;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            factory(User::class)->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_roles()
    {
        $roles = factory(Role::class, 5)->create();

        $response = $this->get(route('roles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.roles.index')
            ->assertViewHas('roles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_role()
    {
        $response = $this->get(route('roles.create'));

        $response->assertOk()->assertViewIs('app.roles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_role()
    {
        $data = factory(Role::class)
            ->make()
            ->toArray();

        $response = $this->post(route('roles.store'), $data);

        $this->assertDatabaseHas('roles', $data);

        $role = Role::latest('id')->first();

        $response->assertRedirect(route('roles.edit', $role));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_role()
    {
        $role = factory(Role::class)->create();

        $response = $this->get(route('roles.show', $role));

        $response
            ->assertOk()
            ->assertViewIs('app.roles.show')
            ->assertViewHas('role');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_role()
    {
        $role = factory(Role::class)->create();

        $response = $this->get(route('roles.edit', $role));

        $response
            ->assertOk()
            ->assertViewIs('app.roles.edit')
            ->assertViewHas('role');
    }

    /**
     * @test
     */
    public function it_updates_the_role()
    {
        $role = factory(Role::class)->create();

        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(route('roles.update', $role), $data);

        $data['id'] = $role->id;

        $this->assertDatabaseHas('roles', $data);

        $response->assertRedirect(route('roles.edit', $role));
    }

    /**
     * @test
     */
    public function it_deletes_the_role()
    {
        $role = factory(Role::class)->create();

        $response = $this->delete(route('roles.destroy', $role));

        $response->assertRedirect(route('roles.index'));

        $this->assertDeleted($role);
    }
}
