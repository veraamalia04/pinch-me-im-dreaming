<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class OrderTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
    }

    public function test_menandai_sedang_diproses(){
        $user = User::factory()->create([
            'username' => 'zayn',
            'password' => Hash::make('password'),
        ]);
        
        $user->roles()->sync([1,2,3]);

        $this->actingAs($user);

        $product = Product::factory()->create();

        $order = Order::factory()->create(['user_id' => $user->id, 'address_id' => $user->activeAddress->id]);

        $response = $this->put(route('put.dashboard.kasir.order.tandai_diproses', $order->id));

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
        ]);
    }

    public function test_menandai_sedang_dikirim(){
        $user = User::factory()->create([
            'username' => 'zayn',
            'password' => Hash::make('password'),
        ]);
        
        $user->roles()->sync([1,2,3]);

        $this->actingAs($user);

        $product = Product::factory()->create();

        $order = Order::factory()->create(['user_id' => $user->id,'address_id' => $user->activeAddress->id]);

        $response = $this->put(route('put.dashboard.kasir.order.tandai_dikirim', $order->id));
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
        ]);
    }

    public function test_menandai_selesai(){
        $user = User::factory()->create([
            'username' => 'zayn',
            'password' => Hash::make('password'),
        ]);
        
        $user->roles()->sync([1,2,3]);

        $this->actingAs($user);

        $product = Product::factory()->create();

        $order = Order::factory()->create([
            'user_id' => $user->id,
            'pemesanan_pada' => now(),
            'pemrosesan_pada' => now(),
            'pengiriman_pada' => now(),
            'address_id' => $user->activeAddress->id,

        ]);

        $response = $this->put(route('put.order.tandai_selesai', $order->id));
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,

        ]);
    }
}
