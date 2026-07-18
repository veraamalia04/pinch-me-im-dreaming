<x-d-layout title="Cashier">

<div class="max-w-7xl mx-auto px-6 py-8">

    <!-- Header -->
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6 mb-8">

        <div>
            <h1 class="text-3xl font-extrabold text-slate-900">
                Dashboard Kasir
            </h1>

            <p class="text-slate-500 mt-2">
                Kelola transaksi pelanggan dengan cepat dan mudah.
            </p>
        </div>

        <div class="flex gap-3">

            <button
                class="bg-white border border-slate-200 px-5 py-3 rounded-xl shadow-sm hover:shadow-md transition">

                Riwayat

            </button>

            <button
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl shadow-md transition">

                + Transaksi Baru

            </button>

        </div>

    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5">

            <p class="text-sm text-slate-500">
                Transaksi Hari Ini
            </p>

            <h2 class="text-3xl font-bold mt-2 text-indigo-600">
                24
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5">

            <p class="text-sm text-slate-500">
                Pendapatan
            </p>

            <h2 class="text-3xl font-bold mt-2 text-emerald-600">
                Rp2,4 Jt
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5">

            <p class="text-sm text-slate-500">
                Produk
            </p>

            <h2 class="text-3xl font-bold mt-2 text-orange-500">
                30
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5">

            <p class="text-sm text-slate-500">
                Pelanggan
            </p>

            <h2 class="text-3xl font-bold mt-2 text-pink-500">
                18
            </h2>

        </div>

    </div>

    <!-- Search -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 mb-8">

        <div class="flex flex-col lg:flex-row gap-4">

            <div class="relative flex-1">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute left-4 top-3.5 w-5 h-5 text-slate-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.3-4.3m1.8-5.2a7 7 0 11-14 0 7 7 0 0114 0z"/>

                </svg>

                <input
                    type="text"
                    placeholder="Cari produk..."
                    class="w-full border border-slate-300 rounded-xl py-3 pl-12 pr-4 focus:ring-2 focus:ring-indigo-500">

            </div>

            <select
                class="border border-slate-300 rounded-xl px-5 py-3">

                <option>Semua Kategori</option>
                <option>Chocolate</option>
                <option>Matcha</option>
                <option>Red Velvet</option>
                <option>Keju</option>

            </select>

        </div>

    </div>

    <!-- Layout Produk & Keranjang -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

        <!-- Produk -->
        <div class="xl:col-span-2">

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    @for($i=1;$i<=9;$i++)

    <div class="group bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

        <!-- Gambar -->
        <div class="relative overflow-hidden">

            <img
                src="https://placehold.co/500x350/f8fafc/94a3b8?text=Kue+Cubit"
                class="w-full h-52 object-cover transition duration-500 group-hover:scale-110">

            <!-- Badge -->
            <div class="absolute top-3 left-3">

                <span class="bg-rose-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">

                    Best Seller

                </span>

            </div>

            <!-- Stock -->
            <div class="absolute top-3 right-3">

                <span class="bg-emerald-500 text-white text-xs px-3 py-1 rounded-full shadow">

                    Ready

                </span>

            </div>

        </div>

        <!-- Content -->
        <div class="p-5">

            <div class="flex justify-between items-start">

                <div>

                    <h3 class="text-lg font-bold text-slate-900">

                        Kue Cubit Matcha

                    </h3>

                    <p class="text-sm text-slate-500 mt-1">

                        Matcha Premium

                    </p>

                </div>

                <div class="text-yellow-400 flex items-center gap-1">

                    ⭐

                    <span class="text-slate-600 text-sm">

                        4.9

                    </span>

                </div>

            </div>

            <!-- Harga -->
            <div class="mt-5 flex justify-between items-center">

                <div>

                    <p class="text-xs uppercase text-slate-400">

                        Harga

                    </p>

                    <h2 class="text-2xl font-bold text-emerald-600">

                        Rp18.000

                    </h2>

                </div>

                <div class="text-right">

                    <p class="text-xs text-slate-400">

                        Stok

                    </p>

                    <p class="font-bold text-slate-700">

                        28 pcs

                    </p>

                </div>

            </div>

            <!-- Tombol -->
            <button
                class="mt-6 w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl font-semibold transition-all duration-300 hover:scale-105">

                + Tambah ke Keranjang

            </button>

        </div>

    </div>

    @endfor

</div>

        </div>

        <!-- Keranjang -->
        <div>

            <div class="sticky top-6">

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

        <!-- Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-indigo-500 p-5 text-white">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-xl font-bold">
                        Keranjang
                    </h2>

                    <p class="text-indigo-100 text-sm">
                        3 Produk Dipilih
                    </p>

                </div>

                <div class="bg-white/20 rounded-xl px-3 py-2">

                    🛒

                </div>

            </div>

        </div>

        <!-- List Produk -->
        <div class="p-5 space-y-5">

            <!-- Item -->
            <div class="flex gap-4">

                <img
                    src="https://placehold.co/80x80"
                    class="w-16 h-16 rounded-xl object-cover">

                <div class="flex-1">

                    <h4 class="font-semibold">
                        Kue Cubit Matcha
                    </h4>

                    <p class="text-sm text-slate-500">
                        Rp18.000
                    </p>

                    <div class="flex items-center gap-3 mt-2">

                        <button
                            class="w-8 h-8 rounded-lg bg-slate-100 hover:bg-slate-200">

                            -

                        </button>

                        <span class="font-semibold">

                            2

                        </span>

                        <button
                            class="w-8 h-8 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">

                            +

                        </button>

                    </div>

                </div>

                <button
                    class="text-red-500 hover:text-red-700">

                    🗑️

                </button>

            </div>

            <hr>

            <!-- Item -->
            <div class="flex gap-4">

                <img
                    src="https://placehold.co/80x80"
                    class="w-16 h-16 rounded-xl object-cover">

                <div class="flex-1">

                    <h4 class="font-semibold">
                        Kue Cubit Keju
                    </h4>

                    <p class="text-sm text-slate-500">
                        Rp15.000
                    </p>

                    <div class="flex items-center gap-3 mt-2">

                        <button
                            class="w-8 h-8 rounded-lg bg-slate-100 hover:bg-slate-200">

                            -

                        </button>

                        <span class="font-semibold">

                            1

                        </span>

                        <button
                            class="w-8 h-8 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">

                            +

                        </button>

                    </div>

                </div>

                <button
                    class="text-red-500 hover:text-red-700">

                    🗑️

                </button>

            </div>

        </div>

        <!-- Ringkasan -->
        <div class="bg-slate-50 p-6 border-t">

            <div class="space-y-3">

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Subtotal
                    </span>

                    <span>
                        Rp51.000
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Pajak (10%)
                    </span>

                    <span>
                        Rp5.100
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Diskon
                    </span>

                    <span class="text-green-600">
                        -Rp1.000
                    </span>

                </div>

                <hr>

                <div class="flex justify-between">

                    <span class="text-xl font-bold">

                        Total

                    </span>

                    <span class="text-2xl font-bold text-indigo-600">

                        Rp55.100

                    </span>

                </div>

            </div>

            <button
                class="w-full mt-6 bg-emerald-600 hover:bg-emerald-700 text-white py-4 rounded-2xl font-bold text-lg transition hover:scale-105">

                Bayar Sekarang

            </button>

        </div>

    </div>

</div>

        </div>

    </div>

</div>

<!-- Checkout Modal -->
<div id="checkoutModal"
     class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">

    <div class="bg-white rounded-3xl w-full max-w-lg shadow-2xl overflow-hidden">

        <!-- Header -->
        <div class="bg-indigo-600 text-white p-6">

            <h2 class="text-2xl font-bold">
                Pembayaran
            </h2>

            <p class="text-indigo-100 mt-1">
                Selesaikan transaksi pelanggan
            </p>

        </div>

        <div class="p-6 space-y-5">

            <div>

                <label class="text-sm text-slate-500">
                    Metode Pembayaran
                </label>

                <select
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3">

                    <option>Tunai</option>
                    <option>QRIS</option>
                    <option>Transfer Bank</option>
                    <option>E-Wallet</option>

                </select>

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Total
                </label>

                <div
                    class="mt-2 text-3xl font-bold text-indigo-600">

                    Rp55.100

                </div>

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Uang Pelanggan
                </label>

                <input
                    type="number"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3"
                    placeholder="Masukkan nominal">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Kembalian
                </label>

                <div
                    class="mt-2 text-2xl font-bold text-emerald-600">

                    Rp44.900

                </div>

            </div>

            <div class="grid grid-cols-2 gap-4 mt-6">

                <button
                    onclick="closeCheckout()"
                    class="py-3 rounded-xl border border-slate-300 hover:bg-slate-100">

                    Batal

                </button>

                <button
                    class="py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold">

                    Bayar

                </button>

            </div>

        </div>

    </div>

</div>

</x-d-layout>