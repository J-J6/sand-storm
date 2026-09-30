<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $overrides = []): array
    {
        return array_merge([
            'fullName' => 'Test Person',
            'orgName' => 'Test Ltd',
            'email' => 'test@example.com',
            'serviceInterest' => 'consulting',
            'batchDetails' => 'Hello from a test',
        ], $overrides);
    }

    public function test_a_valid_submission_is_saved(): void
    {
        Mail::fake();

        $this->post('/contact', $this->payload())->assertSessionHas('success');

        $this->assertDatabaseCount('inquiries', 1);
    }

    public function test_a_filled_honeypot_is_not_saved(): void
    {
        Mail::fake();

        $this->post('/contact', $this->payload(['hp_check' => 'i am a bot']))
            ->assertSessionHas('success');

        $this->assertDatabaseCount('inquiries', 0);
    }

    public function test_the_sixth_submission_in_ten_minutes_is_blocked(): void
    {
        Mail::fake();

        for ($i = 0; $i < 5; $i++) {
            $this->post('/contact', $this->payload())->assertSessionHas('success');
        }

        $this->post('/contact', $this->payload())->assertStatus(429);
        $this->assertDatabaseCount('inquiries', 5);
    }
}
