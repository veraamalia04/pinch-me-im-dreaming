<x-d-layout title="Cashier">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6 mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Kasir
                </h1>
                <p class="text-slate-500 mt-2 text-sm md:text-base">
                    Kelola transaksi pelanggan dengan cepat dan mudah hari ini.
                </p>
            </div>
            <div>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-medium text-sm transition-colors shadow-sm">
                    + Transaksi Baru
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 border border-slate-200 p-6 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 mb-1">
                        Transaksi Hari Ini
                    </p>
                    <h2 class="text-3xl font-bold text-slate-800">
                        {{ $todayOrders->count() }}
                    </h2>
                </div>
                <div class="p-3 bg-indigo-50 rounded-xl">
                    <!-- Icon Receipt -->
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 border border-slate-200 p-6 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 mb-1">
                        Pendapatan
                    </p>
                    <h2 class="text-3xl font-bold text-slate-800">
                        {{-- Menggunakan number_format agar angka ribuan lebih rapi --}}
                        Rp {{ number_format($todayEarnings, 0, ',', '.') }}
                    </h2>
                </div>
                <div class="p-3 bg-emerald-50 rounded-xl">
                    <!-- Icon Money -->
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 border border-slate-200 p-6 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 mb-1">
                        Pelanggan
                    </p>
                    <h2 class="text-3xl font-bold text-slate-800">
                        {{ $todayCustomers }}
                    </h2>
                </div>
                <div class="p-3 bg-pink-50 rounded-xl">
                    <!-- Icon Users -->
                    <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6 mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Pesanan
                </h1>
            </div>
        </div>
        <div class="">
            @foreach ($orders as $order)
                <p>{{ $order->created_at }}</p>
                <p>{{ $order->user->name }}</p>
                <p>{{ $order->status }}</p>
                @foreach ($order->details as $detail)
                    <p>{{ $detail->quantity }} x {{ $detail->product->name }} : {{ $detail->sub_total }}</p>
                @endforeach
                <p>Total {{ $order->total_harga }}</p>
                @if(strtolower($order->status) === 'dipesan')

                    <form action="{{ route('put.dashboard.kasir.order.tandai_diproses', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button>Tandai sedang diproses</button>
                    </form>
                 @endif

                @if(strtolower($order->status) === 'diproses')

                    <form action="{{ route('put.dashboard.kasir.order.tandai_dikirim', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button>Tandai sedang dikirim</button>
                    </form>
                 @endif
            @endforeach
        </div>
    </div>
</x-d-layout>