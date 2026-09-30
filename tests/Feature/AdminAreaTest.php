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

    public function test_guests_are_sent_to_the_login_page(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_admin_can_sign_in_and_see_the_inbox(): void
    {
        $user = User::factory()->create(['password' => 'secret-pass-123']);

        $this->post('/admin/login', [
            'email' => $user->email,
            'password' => 'secret-pass-123',
        ])->assertRedirect('/admin');

        $this->assertAuthenticatedAs($user);
        $this->get('/admin')->assertOk();
    }

    public function test_a_wrong_password_shows_an_error(): void
    {
        $user = User::factory()->create(['password' => 'secret-pass-123']);

        $this->from('/admin/login')
            ->post('/admin/login', ['email' => $user->email, 'password' => 'wrong'])
            ->assertRedirect('/admin/login')
            ->assertSessionHasErrors('credentials');

        $this->assertGuest();
    }

    public function test_the_sixth_login_attempt_in_a_minute_is_blocked(): void
    {
        $user = User::factory()->create(['password' => 'secret-pass-123']);

        for ($i = 0; $i < 5; $i++) {
            $this->post('/admin/login', ['email' => $user->email, 'password' => 'wrong']);
        }

        $this->post('/admin/login', ['email' => $user->email, 'password' => 'wrong'])
            ->assertStatus(429);
    }

    public function test_a_signed_in_admin_can_delete_an_inquiry(): void
    {
        $inquiry = $this->makeInquiry();

        $this->actingAs(User::factory()->create())
            ->delete("/admin/inquiries/{$inquiry->id}")
            ->assertRedirect();

        $this->assertDatabaseMissing('inquiries', ['id' => $inquiry->id]);
    }

    public function test_a_guest_cannot_delete_an_inquiry(): void
    {
        $inquiry = $this->makeInquiry();

        $this->delete("/admin/inquiries/{$inquiry->id}")
            ->assertRedirect('/admin/login');

        $this->assertDatabaseHas('inquiries', ['id' => $inquiry->id]);
    }
}
