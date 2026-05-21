<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderVisibilityTest extends TestCase
{
    use RefreshDatabase;

    private $customer1;
    private $customer2;
    private $admin;
    private $order1;
    private $order2;

    protected function setUp(): void
    {
        parent::setUp();

        // Create users
        $this->customer1 = User::create([
            'name' => 'Customer 1',
            'email' => 'customer1@test.com',
            'password' => bcrypt('password'),
            'role' => 'customer'
        ]);

        $this->customer2 = User::create([
            'name' => 'Customer 2',
            'email' => 'customer2@test.com',
            'password' => bcrypt('password'),
            'role' => 'customer'
        ]);

        $this->admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Create orders
        $this->order1 = Order::create([
            'user_id' => $this->customer1->id,
            'order_code' => 'ORD-TEST-001',
            'status' => 'pending',
            'total_price' => 10000,
            'shipping_address' => 'Addr 1'
        ]);

        $this->order2 = Order::create([
            'user_id' => $this->customer2->id,
            'order_code' => 'ORD-TEST-002',
            'status' => 'pending',
            'total_price' => 20000,
            'shipping_address' => 'Addr 2'
        ]);
    }

    public function test_customer_can_only_see_their_own_orders()
    {
        $token = auth('api')->login($this->customer1);
        
        $response = $this->withHeader('Authorization', "Bearer $token")
            ->getJson('/api/orders');

        $response->assertStatus(200);
        $data = $response->json('data');
        
        $ids = collect($data)->pluck('id')->toArray();
        $this->assertContains($this->order1->id, $ids);
        $this->assertNotContains($this->order2->id, $ids);
    }

    public function test_admin_can_see_all_orders()
    {
        $token = auth('api')->login($this->admin);
        
        $response = $this->withHeader('Authorization', "Bearer $token")
            ->getJson('/api/orders');

        $response->assertStatus(200);
        $data = $response->json('data');
        
        $ids = collect($data)->pluck('id')->toArray();
        $this->assertContains($this->order1->id, $ids);
        $this->assertContains($this->order2->id, $ids);
    }

    public function test_customer_cannot_view_other_users_order_detail()
    {
        $token = auth('api')->login($this->customer1);
        
        $response = $this->withHeader('Authorization', "Bearer $token")
            ->getJson("/api/orders/{$this->order2->id}");

        $response->assertStatus(403);
    }

    public function test_customer_can_view_their_own_order_detail()
    {
        $token = auth('api')->login($this->customer1);
        
        $response = $this->withHeader('Authorization', "Bearer $token")
            ->getJson("/api/orders/{$this->order1->id}");

        $response->assertStatus(200);
        $this->assertEquals($this->order1->id, $response->json('data.id'));
    }
}
