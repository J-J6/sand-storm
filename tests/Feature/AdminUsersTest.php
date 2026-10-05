<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminUsersTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    private function plainAdmin(array $attributes = []): User
    {
        return User::factory()->create(array_merge(['role' => User::ROLE_ADMIN], $attributes));
    }

    private function superAdmin(array $attributes = []): User
    {
        return User::factory()->create(array_merge(['role' => User::ROLE_SUPER_ADMIN], $attributes));
    }

    public function test_guests_are_sent_to_the_login_page(): void
    {
        $this->get('/admin/users')->assertRedirect('/admin/login');
    }

    public function test_a_plain_admin_cannot_open_the_admins_page(): void
    {
        $this->actingAs($this->plainAdmin())->get('/admin/users')->assertForbidden();
    }

    public function test_a_plain_admin_cannot_manage_admins(): void
    {
        $plain = $this->plainAdmin();
        $other = $this->plainAdmin();

        $this->actingAs($plain)->post('/admin/users', [
            'name' => 'New Person',
            'email' => 'new@example.com',
            'role' => User::ROLE_ADMIN,
            'password' => 'a-long-password-123',
        ])->assertForbidden();

        $this->actingAs($plain)
            ->patch("/admin/users/{$other->id}/password", ['password' => 'a-long-password-123'])
            ->assertForbidden();

        $this->actingAs($plain)
            ->patch("/admin/users/{$other->id}/role", ['role' => User::ROLE_SUPER_ADMIN])
            ->assertForbidden();

        $this->actingAs($plain)->delete("/admin/users/{$other->id}")->assertForbidden();

        $this->assertDatabaseMissing('users', ['email' => 'new@example.com']);
        $this->assertSame(User::ROLE_ADMIN, $other->fresh()->role);
        $this->assertDatabaseHas('users', ['id' => $other->id]);
    }

    public function test_a_plain_admin_does_not_see_the_admins_link(): void
    {
        $this->actingAs($this->plainAdmin())
            ->get('/admin')
            ->assertOk()
            ->assertDontSee('/admin/users', false);
    }

    public function test_a_super_admin_can_see_the_admins_page(): void
    {
        $this->plainAdmin(['name' => 'Grace Wanjiku']);

        $this->actingAs($this->superAdmin())
            ->get('/admin/users')
            ->assertOk()
            ->assertSee('Grace Wanjiku');
    }

    public function test_a_super_admin_can_add_an_admin(): void
    {
        $this->actingAs($this->superAdmin())->post('/admin/users', [
            'name' => 'New Person',
            'email' => 'New@Example.com',
            'role' => User::ROLE_ADMIN,
            'password' => 'a-long-password-123',
        ])->assertSessionHas('status');

        $user = User::where('email', 'new@example.com')->first();

        $this->assertNotNull($user);
        $this->assertSame(User::ROLE_ADMIN, $user->role);
        $this->assertTrue(Hash::check('a-long-password-123', $user->password));
    }

    public function test_adding_an_admin_validates_the_input(): void
    {
        $existing = $this->plainAdmin();
        $super = $this->superAdmin();

        $this->actingAs($super)->post('/admin/users', [
            'name' => 'Short Password',
            'email' => 'short@example.com',
            'role' => User::ROLE_ADMIN,
            'password' => 'short',
        ])->assertSessionHasErrors('password', null, 'createUser');

        $this->actingAs($super)->post('/admin/users', [
            'name' => 'Duplicate',
            'email' => $existing->email,
            'role' => User::ROLE_ADMIN,
            'password' => 'a-long-password-123',
        ])->assertSessionHasErrors('email', null, 'createUser');

        $this->assertDatabaseMissing('users', ['email' => 'short@example.com']);
    }

    public function test_a_super_admin_can_reset_a_password_and_sign_the_person_out(): void
    {
        $target = $this->plainAdmin();

        DB::table('sessions')->insert([
            'id' => 'target-session',
            'user_id' => $target->id,
            'ip_address' => null,
            'user_agent' => null,
            'payload' => 'x',
            'last_activity' => time(),
        ]);

        $this->actingAs($this->superAdmin())
            ->patch("/admin/users/{$target->id}/password", ['password' => 'another-long-pass-1'])
            ->assertSessionHas('status');

        $this->assertTrue(Hash::check('another-long-pass-1', $target->fresh()->password));
        $this->assertDatabaseMissing('sessions', ['id' => 'target-session']);
    }

    public function test_a_short_password_is_rejected_on_reset(): void
    {
        $target = $this->plainAdmin(['password' => 'original-long-pass-1']);

        $this->actingAs($this->superAdmin())
            ->patch("/admin/users/{$target->id}/password", ['password' => 'short'])
            ->assertSessionHas('error');

        $this->assertTrue(Hash::check('original-long-pass-1', $target->fresh()->password));
    }

    public function test_a_super_admin_can_change_another_persons_role(): void
    {
        $super = $this->superAdmin();
        $target = $this->plainAdmin();

        $this->actingAs($super)
            ->patch("/admin/users/{$target->id}/role", ['role' => User::ROLE_SUPER_ADMIN])
            ->assertSessionHas('status');
        $this->assertSame(User::ROLE_SUPER_ADMIN, $target->fresh()->role);

        $this->actingAs($super)
            ->patch("/admin/users/{$target->id}/role", ['role' => User::ROLE_ADMIN])
            ->assertSessionHas('status');
        $this->assertSame(User::ROLE_ADMIN, $target->fresh()->role);
    }

    public function test_a_super_admin_cannot_change_their_own_role_or_use_an_invalid_role(): void
    {
        $super = $this->superAdmin();
        $target = $this->plainAdmin();

        $this->actingAs($super)
            ->patch("/admin/users/{$super->id}/role", ['role' => User::ROLE_ADMIN])
            ->assertSessionHas('error');
        $this->assertSame(User::ROLE_SUPER_ADMIN, $super->fresh()->role);

        $this->actingAs($super)
            ->patch("/admin/users/{$target->id}/role", ['role' => 'owner'])
            ->assertSessionHas('error');
        $this->assertSame(User::ROLE_ADMIN, $target->fresh()->role);
    }

    public function test_a_super_admin_can_remove_another_admin(): void
    {
        $target = $this->plainAdmin();

        DB::table('sessions')->insert([
            'id' => 'removed-session',
            'user_id' => $target->id,
            'ip_address' => null,
            'user_agent' => null,
            'payload' => 'x',
            'last_activity' => time(),
        ]);

        $this->actingAs($this->superAdmin())
            ->delete("/admin/users/{$target->id}")
            ->assertSessionHas('status');

        $this->assertDatabaseMissing('users', ['id' => $target->id]);
        $this->assertDatabaseMissing('sessions', ['id' => 'removed-session']);
    }

    public function test_a_super_admin_cannot_remove_themselves(): void
    {
        $super = $this->superAdmin();

        $this->actingAs($super)
            ->delete("/admin/users/{$super->id}")
            ->assertSessionHas('error');

        $this->assertDatabaseHas('users', ['id' => $super->id]);
    }
}
