<?php

namespace Tests\Feature;

use App\Models\Box;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class BoxTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
    }

    public function test_menambahkan_ke_box(){
        $user = User::factory()->create([
            'username' => 'zayn',
            'password' => Hash::make('password'),
        ]);
        
        $user->roles()->sync([1,2,3]);

        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->post(route('post.box.store_to_box'), [
            'product_id' => $product->id,
            'quantity' => 20,
        ]);


        $this->assertDatabaseHas('boxes', [
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('box_details', [
            'product_id' => $product->id,
            'quantity' => 20,
        ]);
    }

    public function test_menghapus_item_dari_box(){
        $user = User::factory()->create([
            'username' => 'zayn',
            'password' => Hash::make('password'),
        ]);
        
        $user->roles()->sync([1,2,3]);

        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->post(route('post.box.store_to_box'), [
            'product_id' => $product->id,
            'quantity' => 20,
        ]);

        $box = Box::with('details')->where('user_id', $user->id)->first();

        $boxDetail = $box->details[0];

        $response = $this->delete(route('delete.box.delete_box_detail', $boxDetail->id));

        $response->assertRedirectBack();
    }

    public function test_memesan_dari_box(){
        $user = User::factory()->create([
            'username' => 'zayn',
            'password' => Hash::make('password'),
        ]);
        
        $user->roles()->sync([1,2,3]);

        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->post(route('post.box.store_to_box'), [
            'product_id' => $product->id,
            'quantity' => 20,
        ]);

        $this->assertDatabaseHas('boxes', [
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('box_details', [
            'product_id' => $product->id,
            'quantity' => 20,
        ]);

        $box = Box::with('details')->where('user_id', $user->id)->first();
        $boxDetail = $box->details[0];

        $response = $this->post(route('post.order.transfer_box_to_order'));

        $this->assertDatabaseHas('order_details', [
            'product_id' => $product->id,
            'quantity' => 20,
        ]);

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'pemesanan_pada' => now(),
        ]);
    }

    
}
