<x-layout title="Detail Order">
    <div class="min-h-screen bg-gradient-to-b from-amber-50 to-orange-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">

            <!-- Tombol Kembali -->
            <a href="{{ route('page.order.index') }}"
               class="inline-flex items-center gap-2 text-amber-800 hover:text-amber-900 font-medium mb-6 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Riwayat Pesanan
            </a>

            <div class="bg-white/80 backdrop-blur-sm border border-amber-200 rounded-2xl shadow-lg overflow-hidden">

                <!-- Header -->
                <div class="bg-gradient-to-r from-amber-700 to-amber-800 px-6 py-5">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div>
                            <p class="text-amber-100 text-xs uppercase tracking-wide font-medium mb-1">
                                Order #{{ $order->id }}
                            </p>
                            <p class="text-amber-50 text-lg font-semibold">
                                {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y, H:i') }}
                            </p>
                        </div>
                        <span @class([
                            'px-4 py-1.5 rounded-full text-sm font-semibold w-fit',
                            'bg-yellow-200 text-yellow-800' => $order->status === 'pending',
                            'bg-green-200 text-green-800' => $order->status === 'selesai',
                            'bg-red-200 text-red-800' => $order->status === 'dibatalkan',
                            'bg-amber-200 text-amber-800' => !in_array($order->status, ['pending','selesai','dibatalkan']),
                        ])>
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>

                <!-- Daftar Produk -->
                <div class="px-6 py-5">
                    <h2 class="text-amber-900 font-bold text-lg mb-4">Item Pesanan</h2>

                    <div class="space-y-3">
                        @foreach ($order->details as $detail)
                            <div class="flex items-center justify-between gap-4 bg-amber-50/70 border border-amber-100 rounded-xl px-4 py-3 hover:bg-amber-50 transition-colors">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 flex items-center justify-center bg-amber-200 text-amber-800 font-bold rounded-lg shrink-0">
                                        {{ $detail->quantity }}x
                                    </div>
                                    <div>
                                        <p class="font-semibold text-amber-900">{{ $detail->product->name }}</p>
                                        <p class="text-xs text-amber-600">
                                            Rp{{ number_format($detail->product->price ?? ($detail->sub_total / $detail->quantity), 0, ',', '.') }} / item
                                        </p>
                                    </div>
                                </div>
                                <p class="font-semibold text-amber-800 whitespace-nowrap">
                                    Rp{{ number_format($detail->sub_total, 0, ',', '.') }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Ringkasan -->
                <div class="bg-amber-50 border-t border-amber-100 px-6 py-5">
                    <div class="flex items-center justify-between">
                        <p class="text-amber-800 font-medium">Total Pembayaran</p>
                        <p class="text-2xl font-bold text-amber-900">
                            Rp{{ number_format($order->total_harga, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                <!-- Aksi -->
                <div class="px-6 py-4 flex flex-col sm:flex-row gap-3 border-t border-amber-100">
                    @if(strtolower($order->status) === 'dikirim')
                    <form action="{{ route('put.order.tandai_selesai', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                                class="flex-1 inline-flex items-center justify-center gap-2 bg-amber-700 hover:bg-amber-800 active:scale-95 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-6 0V5a2 2 0 012-2h0a2 2 0 012 2v2m-6 0h6" />
                            </svg>
                            Tandai selesai
                        </button>
                    </form>
                     @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>