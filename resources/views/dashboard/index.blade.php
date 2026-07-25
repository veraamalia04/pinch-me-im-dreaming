<x-d-layout title="Dashboard">

    <div class="space-y-8">

        {{-- Header --}}
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Selamat Datang 👋
            </h1>
            <p class="text-gray-500 mt-1">
                Ringkasan aktivitas Pinch Me, I'm Dreaming hari ini.
            </p>
        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500">Total Produk</p>
                        <h2 class="text-3xl font-bold mt-2">58</h2>
                    </div>
                    <div class="text-4xl">📦</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500">Order Hari Ini</p>
                        <h2 class="text-3xl font-bold mt-2">23</h2>
                    </div>
                    <div class="text-4xl">🛒</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500">Pendapatan</p>
                        <h2 class="text-3xl font-bold mt-2">
                            Rp 1.250.000
                        </h2>
                    </div>
                    <div class="text-4xl">💰</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500">Customer</p>
                        <h2 class="text-3xl font-bold mt-2">32</h2>
                    </div>
                    <div class="text-4xl">👥</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500">Menu Favorit</p>
                        <h2 class="text-2xl font-bold mt-2">
                            Choco Cheese
                        </h2>
                    </div>
                    <div class="text-4xl">⭐</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500">Stock Menipis</p>
                        <h2 class="text-3xl font-bold mt-2 text-red-500">
                            4
                        </h2>
                    </div>
                    <div class="text-4xl">⚠️</div>
                </div>
            </div>

        </div>

        {{-- Grafik --}}
        <div class="bg-white rounded-2xl shadow-md p-6">

            <h2 class="text-xl font-semibold mb-6">
                Grafik Penjualan Mingguan
            </h2>

            <div class="h-72 flex items-center justify-center border-2 border-dashed rounded-xl text-gray-400">
                Grafik Penjualan (Chart.js)
            </div>

        </div>

        {{-- Table --}}
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

            <div class="bg-white rounded-2xl shadow-md p-6">

                <h2 class="text-xl font-semibold mb-4">
                    Order Terbaru
                </h2>

                <table class="w-full">

                    <thead>

                        <tr class="border-b">

                            <th class="text-left py-3">Invoice</th>
                            <th class="text-left">Customer</th>
                            <th class="text-left">Total</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr class="border-b">

                            <td class="py-3">INV001</td>
                            <td>Vera</td>
                            <td>Rp25.000</td>

                        </tr>

                        <tr class="border-b">

                            <td class="py-3">INV002</td>
                            <td>Andri</td>
                            <td>Rp18.000</td>

                        </tr>

                        <tr>

                            <td class="py-3">INV003</td>
                            <td>Deseri</td>
                            <td>Rp30.000</td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="bg-white rounded-2xl shadow-md p-6">

                <h2 class="text-xl font-semibold mb-4">
                    Stock Hampir Habis
                </h2>

                <table class="w-full">

                    <thead>

                        <tr class="border-b">

                            <th class="text-left py-3">Produk</th>
                            <th class="text-left">Sisa</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr class="border-b">

                            <td class="py-3">Oreo</td>
                            <td>3</td>

                        </tr>

                        <tr class="border-b">

                            <td class="py-3">Keju</td>
                            <td>5</td>

                        </tr>

                        <tr>

                            <td class="py-3">Coklat</td>
                            <td>2</td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Quick Action --}}
        <div class="bg-white rounded-2xl shadow-md p-6">

            <h2 class="text-xl font-semibold mb-6">
                Quick Action
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                <button class="bg-orange-500 hover:bg-orange-600 text-white rounded-xl py-4 font-semibold transition">
                    ➕ Tambah Produk
                </button>

                <button class="bg-blue-500 hover:bg-blue-600 text-white rounded-xl py-4 font-semibold transition">
                    🛒 Order Baru
                </button>

                <button class="bg-green-500 hover:bg-green-600 text-white rounded-xl py-4 font-semibold transition">
                    📦 Kelola Stock
                </button>

                <button class="bg-purple-500 hover:bg-purple-600 text-white rounded-xl py-4 font-semibold transition">
                    📊 Laporan
                </button>

            </div>

        </div>

    </div>

</x-d-layout>