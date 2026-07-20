<?php

use App\Models\Product;
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
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('deskripsi');
            $table->string('foto')->nullable();
            $table->boolean('is_default')->nullable()->default(false);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('product_id')->constrained('products');
            $table->unsignedMediumInteger('harga_rupiah');
            $table->timestamps();
        });

        Schema::create('boxes', function (Blueprint $table) {
            $table->ulid('id')->primary();

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
            $table->ulid('id')->primary();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamp('pemesanan_pada')->nullable();
            $table->timestamp('pemrosesan_pada')->nullable();
            $table->timestamp('pengiriman_pada')->nullable();
            $table->timestamp('selesai_pada')->nullable();
            $table->softDeletes();
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

        $dataProduk = [
            ['name' => 'Kue Cubit Matcha', 'deskripsi' => 'Kue Cubit matchaaa Hulk'],
            ['name' => 'Kue Cubit Cokelat', 'deskripsi' => 'Kue Cubit renyah dengan balutan cokelat leleh'],
            ['name' => 'Kue Cubit Sprinkle', 'deskripsi' => 'Kue Cubit manis dengan taburan sprinkle warna-warni'],
            ['name' => 'Kue Cubit Keju', 'deskripsi' => 'Kue cubit gurih dengan taburan keju melimpah'],
            ['name' => 'Kue Cubit Red Velvet', 'deskripsi' => 'Kue cubit merah merona rasa red velvet'],
            ['name' => 'Kue Cubit Taro', 'deskripsi' => 'Kue cubit ungu manis rasa taro'],
            ['name' => 'Kue Cubit Vanilla', 'deskripsi' => 'Kue cubit klasik harum vanilla'],
            ['name' => 'Kue Cubit Oreo', 'deskripsi' => 'Kue cubit dengan remahan biskuit Oreo'],
            ['name' => 'Kue Cubit Tiramisu', 'deskripsi' => 'Kue cubit aroma kopi tiramisu yang khas'],
            ['name' => 'Kue Cubit Greentea Almond', 'deskripsi' => 'Kue cubit greentea dengan irisan kacang almond'],
            ['name' => 'Kue Cubit Nutella', 'deskripsi' => 'Kue cubit isi selai Nutella lumer di mulut'],
            ['name' => 'Kue Cubit Keju Panggang', 'deskripsi' => 'Kue Cubit gurih dengan lapisan keju panggang'],
            ['name' => 'Kue Cubit Moka', 'deskripsi' => 'Kue Cubit renyah dengan aroma kopi moka'],
            ['name' => 'Kue Cubit Klasik', 'deskripsi' => 'Kue Cubit jadul renyah tahan lama'],
            ['name' => 'Kue Cubit Pandan', 'deskripsi' => 'Kue cubit wangi pandan asli'],
            ['name' => 'Kue Cubit Strawberry', 'deskripsi' => 'Kue cubit segar dengan topping selai strawberry'],
            ['name' => 'Kue Cubit Blueberry', 'deskripsi' => 'Kue cubit manis asam paduan selai blueberry'],
            ['name' => 'Kue Cubit Beng-Beng', 'deskripsi' => 'Kue cubit dengan topping potongan Beng-Beng'],
            ['name' => 'Kue Cubit Milo', 'deskripsi' => 'Kue cubit legit taburan bubuk cokelat Milo'],
            ['name' => 'Kue Cubit Choco Chips', 'deskripsi' => 'Kue cubit vanilla bertabur butiran choco chips'],
            ['name' => 'Kue Cubit Biskuit Regal', 'deskripsi' => 'Kue cubit lembut dengan topping biskuit Marie Regal'],
            ['name' => 'Kue Cubit KitKat', 'deskripsi' => 'Kue cubit dengan patahan cokelat KitKat renyah'],
            ['name' => 'Kue Cubit Ovomaltine', 'deskripsi' => 'Kue cubit lumer selai Ovomaltine crunchy'],
            ['name' => 'Kue Cubit Kacang Sangrai', 'deskripsi' => 'Kue cubit klasik topping kacang tanah sangrai'],
            ['name' => 'Kue Cubit Karamel', 'deskripsi' => 'Kue cubit manis dengan siraman saus karamel'],
            ['name' => 'Kue Cubit Nangka', 'deskripsi' => 'Kue cubit wangi dengan irisan buah nangka'],
            ['name' => 'Kue Cubit Durian', 'deskripsi' => 'Kue cubit premium aroma durian legit'],
            ['name' => 'Kue Cubit Kismis', 'deskripsi' => 'Kue cubit klasik dengan topping kismis manis'],
            ['name' => 'Kue Cubit Messes', 'deskripsi' => 'Kue cubit jadul tabur messes cokelat meriah'],
            ['name' => 'Kue Cubit Cokelat Pekat', 'deskripsi' => 'Kue cubit dark chocolate anti eneg'],
        ];

        foreach ($dataProduk as $item) {
            $product = Product::create([
                'name'       => $item['name'],
                'deskripsi'  => $item['deskripsi'],
                'foto'       => 'images/products/matcha-hulk.jpg', // Foto dipertahankan
                'is_default' => true,
            ]);

            $product->prices()->create(['harga_rupiah' => 1000]);
        }
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
