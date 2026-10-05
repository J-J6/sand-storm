<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAreaTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    private function makeInquiry(): Inquiry
    {
        return Inquiry::create([
            'full_name' => 'Test Person',
            'organization' => 'Test Ltd',
            'email' => 'test@example.com',
            'service_interest' => 'consulting',
            'message' => 'Hello from a test',
        ]);
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
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_admin_can_sign_in_and_see_the_inbox(): void
    {
        $user = $this->plainAdmin(['password' => 'secret-pass-123']);

        $this->post('/admin/login', [
            'email' => $user->email,
            'password' => 'secret-pass-123',
        ])->assertRedirect('/admin');

        $this->assertAuthenticatedAs($user);
        $this->get('/admin')->assertOk();
    }

    public function test_a_wrong_password_shows_an_error(): void
    {
        $user = $this->plainAdmin(['password' => 'secret-pass-123']);

        $this->from('/admin/login')
            ->post('/admin/login', ['email' => $user->email, 'password' => 'wrong'])
            ->assertRedirect('/admin/login')
            ->assertSessionHasErrors('credentials');

        $this->assertGuest();
    }

    public function test_the_sixth_login_attempt_in_a_minute_is_blocked(): void
    {
        $user = $this->plainAdmin(['password' => 'secret-pass-123']);

        for ($i = 0; $i < 5; $i++) {
            $this->post('/admin/login', ['email' => $user->email, 'password' => 'wrong']);
        }

        $this->post('/admin/login', ['email' => $user->email, 'password' => 'wrong'])
            ->assertStatus(429);
    }

    public function test_a_super_admin_can_delete_an_inquiry(): void
    {
        $inquiry = $this->makeInquiry();

        $this->actingAs($this->superAdmin())
            ->delete("/admin/inquiries/{$inquiry->id}")
            ->assertRedirect();

        $this->assertDatabaseMissing('inquiries', ['id' => $inquiry->id]);
    }

    public function test_a_plain_admin_cannot_delete_an_inquiry(): void
    {
        $inquiry = $this->makeInquiry();

        $this->actingAs($this->plainAdmin())
            ->delete("/admin/inquiries/{$inquiry->id}")
            ->assertForbidden();

        $this->assertDatabaseHas('inquiries', ['id' => $inquiry->id]);
    }

    public function test_a_guest_cannot_delete_an_inquiry(): void
    {
        $inquiry = $this->makeInquiry();

        $this->delete("/admin/inquiries/{$inquiry->id}")
            ->assertRedirect('/admin/login');

        $this->assertDatabaseHas('inquiries', ['id' => $inquiry->id]);
    }

    public function test_a_plain_admin_does_not_see_delete_buttons(): void
    {
        $this->makeInquiry();

        $this->actingAs($this->plainAdmin())
            ->get('/admin')
            ->assertOk()
            ->assertDontSee('data-delete-url', false);
    }

    public function test_a_super_admin_sees_delete_buttons(): void
    {
        $this->makeInquiry();

        $this->actingAs($this->superAdmin())
            ->get('/admin')
            ->assertOk()
            ->assertSee('data-delete-url', false);
    }
}
