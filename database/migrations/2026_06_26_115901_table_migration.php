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
        Schema::create('addresses', function (Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->unsignedSmallInteger('rt');
            $table->unsignedSmallInteger('rw');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('kelurahan');
            $table->string('alamat');
            $table->string('kode_pos');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

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
            $table->foreignId('address_id')->constrained('addresses');
            
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
            ['name' => 'Kue Cubit Matcha', 'deskripsi' => 'Kue Cubit matchaaa Hulk', 'harga' => 1000, 'image' => 'images/products/matcha-hulk.jpg'],
            ['name' => 'Kue Cubit Cokelat', 'deskripsi' => 'Kue Cubit renyah dengan balutan cokelat leleh', 'harga' => 1000, 'image' => 'images/products/coklat.jpeg'],
            ['name' => 'Kue Cubit Sprinkle', 'deskripsi' => 'Kue Cubit manis dengan taburan sprinkle warna-warni', 'harga' => 1000, 'image' => 'images/products/sprinkle.jpg'],
            ['name' => 'Kue Cubit Keju', 'deskripsi' => 'Kue cubit gurih dengan taburan keju melimpah', 'harga' => 1000, 'image' => 'images/products/cheese.jpg'],
            ['name' => 'Kue Cubit Red Velvet', 'deskripsi' => 'Kue cubit merah merona rasa red velvet', 'harga' => 1000, 'image' => 'images/products/red-velvet.jpeg'],
            ['name' => 'Kue Cubit Taro', 'deskripsi' => 'Kue cubit ungu manis rasa taro', 'harga' => 1000, 'image' => 'images/products/taro.png'],
            ['name' => 'Kue Cubit Vanilla', 'deskripsi' => 'Kue cubit klasik harum vanilla', 'harga' => 1000, 'image' => 'images/products/vanilla.jpeg'],
            ['name' => 'Kue Cubit Oreo', 'deskripsi' => 'Kue cubit dengan remahan biskuit Oreo', 'harga' => 1000, 'image' => 'images/products/oreo.jpg'],
            ['name' => 'Kue Cubit Tiramisu', 'deskripsi' => 'Kue cubit aroma kopi tiramisu yang khas', 'harga' => 1000, 'image' => 'images/products/tira-misu.jpg'],
            ['name' => 'Kue Cubit Greentea Almond', 'deskripsi' => 'Kue cubit greentea dengan irisan kacang almond', 'harga' => 1000, 'image' => 'images/products/greentea-almond.jpeg'],
            ['name' => 'Kue Cubit Nutella', 'deskripsi' => 'Kue cubit isi selai Nutella lumer di mulut', 'harga' => 1000, 'image' => 'images/products/nutella.jpg'],
            ['name' => 'Kue Cubit Keju Panggang', 'deskripsi' => 'Kue Cubit gurih dengan lapisan keju panggang', 'harga' => 1000, 'image' => 'images/products/keju-panggang.jpeg'],
            ['name' => 'Kue Cubit Moka', 'deskripsi' => 'Kue Cubit renyah dengan aroma kopi moka', 'harga' => 1000, 'image' => 'images/products/moka.jpg'],
            ['name' => 'Kue Cubit Klasik', 'deskripsi' => 'Kue Cubit jadul renyah tahan lama', 'harga' => 1000, 'image' => 'images/products/klasik.jpeg'],
            ['name' => 'Kue Cubit Pandan', 'deskripsi' => 'Kue cubit wangi pandan asli', 'harga' => 1000, 'image' => 'images/products/pandan.jpg'],
            ['name' => 'Kue Cubit Strawberry', 'deskripsi' => 'Kue cubit segar dengan topping selai strawberry', 'harga' => 1000, 'image' => 'images/products/strawberry.jpg'],
            ['name' => 'Kue Cubit Blueberry', 'deskripsi' => 'Kue cubit manis asam paduan selai blueberry', 'harga' => 1000, 'image' => 'images/products/taro.png'],
            ['name' => 'Kue Cubit Beng-Beng', 'deskripsi' => 'Kue cubit dengan topping potongan Beng-Beng', 'harga' => 1000, 'image' => 'images/products/beng-beng.jpeg'],
            ['name' => 'Kue Cubit Milo', 'deskripsi' => 'Kue cubit legit taburan bubuk cokelat Milo', 'harga' => 1000, 'image' => 'images/products/milo.jpg'],
            ['name' => 'Kue Cubit Choco Chips', 'deskripsi' => 'Kue cubit vanilla bertabur butiran choco chips', 'harga' => 1000, 'image' => 'images/products/vanilla.jpeg'],
            ['name' => 'Kue Cubit Biskuit Regal', 'deskripsi' => 'Kue cubit lembut dengan topping biskuit Marie Regal', 'harga' => 1000, 'image' => 'images/products/biskuit-regal.jpeg'],
            ['name' => 'Kue Cubit KitKat', 'deskripsi' => 'Kue cubit dengan patahan cokelat KitKat renyah', 'harga' => 1000, 'image' => 'images/products/kitkat.jpg'],
            ['name' => 'Kue Cubit Ovomaltine', 'deskripsi' => 'Kue cubit lumer selai Ovomaltine crunchy', 'harga' => 1000, 'image' => 'images/products/kitkat.jpg'],
            ['name' => 'Kue Cubit Kacang Sangrai', 'deskripsi' => 'Kue cubit klasik topping kacang tanah sangrai', 'harga' => 1000, 'image' => 'images/products/kacang-sangrai.jpeg'],
            ['name' => 'Kue Cubit Karamel', 'deskripsi' => 'Kue cubit manis dengan siraman saus karamel', 'harga' => 1000, 'image' => 'images/products/tira-misu.jpg'],
            ['name' => 'Kue Cubit Nangka', 'deskripsi' => 'Kue cubit wangi dengan irisan buah nangka', 'harga' => 1000, 'image' => 'images/products/klasik.jpeg'],
            ['name' => 'Kue Cubit Durian', 'deskripsi' => 'Kue cubit premium aroma durian legit', 'harga' => 1000, 'image' => 'images/products/tira-misu.jpg'],
            ['name' => 'Kue Cubit Kismis', 'deskripsi' => 'Kue cubit klasik dengan topping kismis manis', 'harga' => 1000, 'image' => 'images/products/kismis.jpg'],
            ['name' => 'Kue Cubit Messes', 'deskripsi' => 'Kue cubit jadul tabur messes cokelat meriah', 'harga' => 1000, 'image' => 'images/products/sprinkle.jpg'],
            ['name' => 'Kue Cubit Cokelat Pekat', 'deskripsi' => 'Kue cubit dark chocolate anti eneg', 'harga' => 1000, 'image' => 'images/products/melt-choco.jpg'],
        ];

        foreach ($dataProduk as $item) {
            $product = Product::create([
                'name'       => $item['name'],
                'deskripsi'  => $item['deskripsi'],
                'foto'       => $item['image'], 
                'is_default' => true,
            ]);

            $product->prices()->create(['harga_rupiah' => $item['harga']]);
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
