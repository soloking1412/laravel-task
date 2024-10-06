<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Modules\Newsletter\Models\Subscriber;

class NewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_newsletter_page_loads()
    {
        $response = $this->get('/newsletter');
        $response->assertStatus(200);
    }

    public function test_user_can_subscribe()
    {
        $response = $this->post('/newsletter/subscribe', [
            'email' => 'test@example.com'
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('subscribers', [
            'email' => 'test@example.com'
        ]);
    }

    public function test_user_cannot_subscribe_twice()
    {
        Subscriber::create(['email' => 'test@example.com']);

        $response = $this->post('/newsletter/subscribe', [
            'email' => 'test@example.com'
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertCount(1, Subscriber::all());
    }

    public function test_invalid_email_is_rejected()
    {
        $response = $this->post('/newsletter/subscribe', [
            'email' => 'not-an-email'
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertCount(0, Subscriber::all());
    }
}