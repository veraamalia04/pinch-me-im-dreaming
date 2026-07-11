<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('role_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('role_id')->constrained('roles');
            $table->timestamps();
        });

        $roles = ['cashier', 'stocker', 'owner'];
        foreach($roles as $role){
            Role::create(
                ['name' => $role]
            );
        }

        Schema::create('products', function (Blueprint $table) {
            $table->ulid();
            $table->string('name');
            $table->string('deskripsi');
            $table->string('foto')->nullable();
            $table->timestamps();
        });

        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('product_id')->constrained('products');
            $table->unsignedMediumInteger('harga_rupiah');
            $table->timestamps();
        });

        Schema::create('boxes', function (Blueprint $table) {
            $table->ulid();

            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });

        Schema::create('box_details', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('box_id')->constrained('boxes');
            $table->foreignUlid('product_id')->constrained('products');
            $table->unsignedBigInteger('quantity')->default(1);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamp('pemesanan_pada')->nullable();
            $table->timestamp('pemrosesan_pada')->nullable();
            $table->timestamp('pengiriman_pada')->nullable();
            $table->timestamp('selesai_pada')->nullable();

            $table->timestamps();
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->id();

            $table->foreignUlid('order_id')->constrained('orders');
            $table->foreignUlid('product_id')->constrained('products');

            $table->unsignedBigInteger('quantity')->default(1);
            $table->unsignedBigInteger('harga_rupiah');

            $table->timestamps();
        });

        $all_role = Role::pluck('id')->toArray();
        $user = User::where('username', 'vera')->first();
        $user->roles()->sync($all_role);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('box_details');
        Schema::dropIfExists('boxes');
        Schema::dropIfExists('product_prices');
        Schema::dropIfExists('products');
    }
};
