<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StageThreeTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_messages_are_persisted_after_validation(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Mara Chen',
            'email' => 'mara@example.com',
            'subject' => 'Fit guidance',
            'message' => 'I would like help choosing a long-distance setup.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('status');
        $this->assertDatabaseHas('contact_messages', [
            'email' => 'mara@example.com',
            'subject' => 'Fit guidance',
        ]);
    }

    public function test_contact_messages_require_valid_input(): void
    {
        $this->post(route('contact.store'), [
            'name' => '',
            'email' => 'not-an-email',
            'subject' => '',
            'message' => '',
        ])->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        $this->assertSame(0, ContactMessage::count());
    }

    public function test_non_admin_users_cannot_access_admin_surface(): void
    {
        $this->actingAs(User::factory()->create())->get(route('admin'))->assertForbidden();
    }

    public function test_admin_users_can_access_admin_surface(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)->get(route('admin'))->assertOk();
    }
}
