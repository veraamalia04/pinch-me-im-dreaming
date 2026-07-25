<x-layout title="Order">
    <div class="min-h-screen bg-gradient-to-b from-amber-50 to-orange-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl sm:text-4xl font-bold text-amber-900 mb-2 text-center">
                Riwayat Pesanan
            </h1>
            <p class="text-amber-700 text-center mb-8">Semua transaksi kue cubit kamu ada di sini</p>

            @if($orders->isEmpty())
                <div class="text-center py-16">
                    <p class="text-amber-800 text-lg">Belum ada pesanan nih.</p>
                </div>
            @else
                <div class="space-y-5">
                    @foreach ($orders as $order)
                        <div class="bg-white/80 backdrop-blur-sm border border-amber-200 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden">

                            <!-- Header -->
                            <div class="bg-gradient-to-r from-amber-700 to-amber-800 px-5 py-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                <p class="text-amber-50 text-sm font-medium">
                                    {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d M Y, H:i') }}
                                </p>
                                <span @class([
                                    'px-3 py-1 rounded-full text-xs font-semibold w-fit',
                                    'bg-yellow-200 text-yellow-800' => $order->status === 'pending',
                                    'bg-green-200 text-green-800' => $order->status === 'selesai',
                                    'bg-red-200 text-red-800' => $order->status === 'dibatalkan',
                                    'bg-amber-200 text-amber-800' => !in_array($order->status, ['pending','selesai','dibatalkan']),
                                ])>
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>

                            <!-- Detail Produk -->
                            <div class="px-5 py-4 divide-y divide-amber-100">
                                @foreach ($order->details as $detail)
                                    <div class="flex justify-between items-center py-2 text-amber-900">
                                        <p class="text-sm sm:text-base">
                                            <span class="font-semibold">{{ $detail->quantity }}x</span>
                                            {{ $detail->product->name }}
                                        </p>
                                        <p class="text-sm sm:text-base font-medium text-amber-700">
                                            Rp{{ number_format($detail->sub_total, 0, ',', '.') }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Footer -->
                            <div class="bg-amber-50 px-5 py-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-t border-amber-100">
                                <p class="text-lg font-bold text-amber-900">
                                    Total: <span class="text-amber-700">Rp{{ number_format($order->total_harga, 0, ',', '.') }}</span>
                                </p>
                                <a href="{{ route('page.order.show', $order->id) }}"
                                   class="inline-flex items-center justify-center gap-2 bg-amber-700 hover:bg-amber-800 active:scale-95 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow transition-all duration-200">
                                    Lihat Detail
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layout>