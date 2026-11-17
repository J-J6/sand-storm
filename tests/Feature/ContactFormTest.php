<?php

namespace Tests\Feature;

use App\Models\Inquiry;
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
            'serviceInterest' => 'custom-bag',
            'bagType' => 'pp-woven',
            'contents' => 'cement',
            'capacity' => '50kg',
            'bagColour' => 'white',
            'printing' => 'two-colours',
            'printSides' => 'both-sides',
            'artwork' => 'ready',
            'extras' => ['liner', 'uv'],
            'quantity' => '10k-50k',
            'batchDetails' => 'Hello from a test',
        ], $overrides);
    }

    public function test_a_valid_submission_is_saved(): void
    {
        Mail::fake();

        $this->post('/contact', $this->payload())->assertSessionHas('success');

        $this->assertDatabaseCount('inquiries', 1);
    }

    public function test_the_chosen_bag_options_are_saved_in_the_message(): void
    {
        Mail::fake();

        $this->post('/contact', $this->payload())->assertSessionHas('success');

        $message = Inquiry::firstOrFail()->message;

        $this->assertStringContainsString('Bag type: PP woven bag', $message);
        $this->assertStringContainsString('Extras: Inner liner (moisture barrier), UV protection', $message);
        $this->assertStringContainsString("Notes:\nHello from a test", $message);
    }

    public function test_a_custom_bag_request_needs_every_question_answered(): void
    {
        Mail::fake();

        $this->post('/contact', $this->payload(['bagType' => null, 'quantity' => 'a-million']))
            ->assertSessionHasErrors(['bagType', 'quantity']);

        $this->assertDatabaseCount('inquiries', 0);
    }

    public function test_extras_are_optional(): void
    {
        Mail::fake();

        $this->post('/contact', $this->payload(['extras' => null]))->assertSessionHas('success');

        $this->assertStringContainsString('Extras: None', Inquiry::firstOrFail()->message);
    }

    public function test_a_job_application_does_not_need_bag_answers(): void
    {
        Mail::fake();

        $this->post('/contact', [
            'fullName' => 'Job Seeker',
            'orgName' => 'Job applicant',
            'email' => 'seeker@example.com',
            'serviceInterest' => 'job-inquiry',
            'batchDetails' => 'Machine operator',
        ])->assertSessionHas('job_success');

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
