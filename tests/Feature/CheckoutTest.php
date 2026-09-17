<?php

namespace Tests\Feature;

use App\Models\BikeOrder;
use App\Models\Bicycle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_checkout_can_be_rendered_for_a_bicycle(): void
    {
        $bicycle = $this->createBicycle();

        $this->get(route('checkout', $bicycle))->assertOk();
    }

    public function test_checkout_creates_a_pending_order_request(): void
    {
        $bicycle = $this->createBicycle(['price' => 8900]);

        $response = $this->post(route('checkout.store', $bicycle), [
            'name' => 'Alex Rider',
            'email' => 'alex@example.com',
            'address' => '1 Long Way',
            'city' => 'Portland',
            'postal_code' => '97201',
        ]);

        $order = BikeOrder::first();
        $this->assertNotNull($order);
        $this->assertSame($bicycle->id, $order->bicycle_id);
        $this->assertSame('request_received', $order->status);
        $response->assertRedirect(route('checkout.confirmation', $order));
    }

    public function test_checkout_requires_delivery_details(): void
    {
        $bicycle = $this->createBicycle();

        $this->post(route('checkout.store', $bicycle), [])->assertSessionHasErrors([
            'name', 'email', 'address', 'city', 'postal_code',
        ]);

        $this->assertSame(0, BikeOrder::count());
    }

    private function createBicycle(array $overrides = []): Bicycle
    {
        return Bicycle::create(array_merge([
            'name' => 'Test Bicycle', 'slug' => 'test-bicycle', 'category' => 'Road',
            'tagline' => 'Test ride', 'description' => 'Test description', 'price' => 5000,
            'weight' => 8.0, 'frame_material' => 'Carbon', 'wheel_info' => '700c',
            'drivetrain' => 'Electronic', 'brakes' => 'Hydraulic', 'image_url' => 'test.jpg',
        ], $overrides));
    }
}
