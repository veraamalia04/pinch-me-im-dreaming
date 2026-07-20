<x-d-layout title="Owner">

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row justify-between items-end gap-6 mb-10">

        <div>

            <div class="flex items-center gap-3 mb-2">

                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Dashboard Owner
                </h2>

                <span class="inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 ring-1 ring-inset ring-indigo-700/10">
                    Owner
                </span>

            </div>

            <p class="text-slate-500">
                Pantau performa toko dan kelola seluruh aktivitas bisnis.
            </p>

        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm px-6 py-4">

            <p class="text-sm text-slate-500">
                Selamat Datang
            </p>

            <h3 class="font-bold text-slate-800 text-lg">
                Owner 👋
            </h3>

        </div>

    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

        {{-- Card 1 --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6">

             <div class="flex justify-between items-center mt-4 gap-2">

                     <div>

                    <p class="text-sm text-slate-500">
                      Total Penjualan
                    </p>

                <div class="flex items-end gap-1 mt-2">

            <span class="text-sm font-semibold text-slate-500">
               Rp
                 </span>

            <span class="text-xl font-bold text-slate-900">
                  5.450.000
                </span>

                 </div>

                <span class="text-xs text-emerald-600 font-medium">
                   ↑ 12% dari bulan lalu
                </span>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-emerald-100 flex items-center justify-center text-3xl">
                    💰
                </div>

            </div>

        </div>

        {{-- Card 2 --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Produk
                    </p>

                    <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                        18
                    </h2>

                    <span class="text-indigo-600 text-sm font-medium">
                        Produk Aktif
                    </span>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center text-3xl">
                    📦
                </div>

            </div>

        </div>

        {{-- Card 3 --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Pesanan Hari Ini
                    </p>

                    <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                        42
                    </h2>

                    <span class="text-orange-600 text-sm font-medium">
                        Order
                    </span>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center text-3xl">
                    🛒
                </div>

            </div>

        </div>

        {{-- Card 4 --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Stok Menipis
                    </p>

                    <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                        3
                    </h2>

                    <span class="text-rose-600 text-sm font-medium">
                        Perlu Restock
                    </span>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-rose-100 flex items-center justify-center text-3xl">
                    ⚠️
                </div>

            </div>

        </div>

    </div>

        {{-- Grafik & Quick Action --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-10">

        {{-- Grafik --}}
        <div class="xl:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

            <div class="flex items-center justify-between mb-6">

                <div>
                    <h3 class="text-xl font-bold text-slate-900">
                        Grafik Penjualan
                    </h3>
                    <p class="text-sm text-slate-500">
                        Ringkasan penjualan 6 bulan terakhir
                    </p>
                </div>

                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold">
                    +12%
                </span>

            </div>

            <div class="h-80 rounded-2xl bg-gradient-to-r from-indigo-50 to-slate-50 border-2 border-dashed border-slate-300 flex flex-col items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-16 h-16 text-slate-400 mb-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="1.5"
                          d="M3 17l5-5 4 4 7-9"/>

                </svg>

                <p class="text-slate-500">
                    Grafik Penjualan
                </p>

                <p class="text-sm text-slate-400 mt-2">
                    (Chart.js akan ditampilkan di sini)
                </p>

            </div>

        </div>

        {{-- Quick Action --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

            <h3 class="text-xl font-bold text-slate-900 mb-6">
                Quick Action
            </h3>

            <div class="space-y-4">

                <button class="w-full rounded-xl bg-slate-900 text-white py-3 font-semibold hover:bg-indigo-600 transition-all duration-300">
                    Tambah Produk
                </button>

                <button class="w-full rounded-xl bg-emerald-600 text-white py-3 font-semibold hover:bg-emerald-700 transition-all duration-300">
                    Kelola Produk
                </button>

                <button class="w-full rounded-xl bg-orange-500 text-white py-3 font-semibold hover:bg-orange-600 transition-all duration-300">
                    Laporan Penjualan
                </button>

                <button class="w-full rounded-xl bg-indigo-600 text-white py-3 font-semibold hover:bg-indigo-700 transition-all duration-300">
                    Statistik
                </button>

            </div>

        </div>

    </div>

    {{-- Produk Terlaris --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-10">

        <div class="flex items-center justify-between px-6 py-5 border-b">

            <h3 class="text-xl font-bold text-slate-900">
                Produk Terlaris
            </h3>

            <span class="text-sm text-slate-500">
                Top 3
            </span>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="text-left px-6 py-4 font-semibold text-slate-700">
                            Produk
                        </th>

                        <th class="text-left px-6 py-4 font-semibold text-slate-700">
                            Terjual
                        </th>

                        <th class="text-left px-6 py-4 font-semibold text-slate-700">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <tr class="border-b hover:bg-slate-50 transition">

                        <td class="px-6 py-4">
                            Kue Cubit Original
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            125
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold">
                                Terlaris
                            </span>

                        </td>

                    </tr>

                    <tr class="border-b hover:bg-slate-50 transition">

                        <td class="px-6 py-4">
                            Red Velvet
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            102
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold">
                                Favorit
                            </span>

                        </td>

                    </tr>

                    <tr class="hover:bg-slate-50 transition">

                        <td class="px-6 py-4">
                            Matcha
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            97
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-xs font-semibold">
                                Populer
                            </span>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

        {{-- Aktivitas Terbaru --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Timeline Aktivitas --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

            <h3 class="text-xl font-bold text-slate-900 mb-6">
                Aktivitas Terbaru
            </h3>

            <div class="space-y-5">

                <div class="flex items-start gap-4">

                    <div class="w-3 h-3 rounded-full bg-emerald-500 mt-2"></div>

                    <div>

                        <h4 class="font-semibold text-slate-800">
                            Transaksi Baru
                        </h4>

                        <p class="text-sm text-slate-500">
                            Kasir berhasil membuat transaksi baru.
                        </p>

                        <span class="text-xs text-slate-400">
                            5 menit yang lalu
                        </span>

                    </div>

                </div>

                <div class="flex items-start gap-4">

                    <div class="w-3 h-3 rounded-full bg-indigo-500 mt-2"></div>

                    <div>

                        <h4 class="font-semibold text-slate-800">
                            Produk Ditambahkan
                        </h4>

                        <p class="text-sm text-slate-500">
                            Stocker menambahkan stok Kue Cubit Original.
                        </p>

                        <span class="text-xs text-slate-400">
                            20 menit yang lalu
                        </span>

                    </div>

                </div>

                <div class="flex items-start gap-4">

                    <div class="w-3 h-3 rounded-full bg-orange-500 mt-2"></div>

                    <div>

                        <h4 class="font-semibold text-slate-800">
                            Harga Produk
                        </h4>

                        <p class="text-sm text-slate-500">
                            Harga Red Velvet berhasil diperbarui.
                        </p>

                        <span class="text-xs text-slate-400">
                            1 jam yang lalu
                        </span>

                    </div>

                </div>

            </div>

        </div>

        {{-- Ringkasan --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

            <h3 class="text-xl font-bold text-slate-900 mb-6">
                Ringkasan Toko
            </h3>

            <div class="space-y-5">

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Total Produk
                    </span>

                    <span class="font-bold">
                        18
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Produk Aktif
                    </span>

                    <span class="font-bold text-emerald-600">
                        16
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Produk Habis
                    </span>

                    <span class="font-bold text-rose-600">
                        2
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Total Pesanan
                    </span>

                    <span class="font-bold">
                        42
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Pendapatan Hari Ini
                    </span>

                    <span class="font-bold text-emerald-600">
                        Rp 5.450.000
                    </span>

                </div>

            </div>

        </div>

    </div>

    {{-- Footer --}}
    <div class="mt-10 text-center">

        <p class="text-sm text-slate-400">
            © {{ date('Y') }} Pinch Me I'm Dreaming — Dashboard Owner
        </p>

    </div>

</div>

</x-d-layout>