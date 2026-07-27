@props([
    'orders' => []
])

<div class="space-y-4" id="historyContainer">
    @foreach ($orders->whereNotNull('selesai_pada') as $order)
        <!-- data-date menyimpan tanggal murni untuk di filter oleh JS (Format: YYYY-MM-DD) -->
        <div class="history-item bg-white rounded-xl shadow-sm border border-slate-200 p-4 md:p-6 flex flex-col lg:flex-row gap-6 justify-between items-start lg:items-center opacity-75 hover:opacity-100 transition-opacity duration-200"
                data-date="{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}">
            
            <!-- Profil Pelanggan & Status -->
            <div class="flex flex-col gap-3 w-full lg:w-3/12">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-slate-800">{{ $order->user->name }}</span>
                        <span class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</span>
                    </div>
                </div>
                <div>
                    <span class="inline-block px-3 py-1 rounded-md text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                        Selesai
                    </span>
                </div>
            </div>

            <!-- Rincian Item -->
            <div class="bg-slate-50/70 rounded-lg p-3 border border-slate-100 w-full lg:w-6/12">
                <div class="space-y-2">
                    @foreach ($order->details as $detail)
                        <div class="flex justify-between items-start text-sm">
                            <div class="flex items-start gap-2 pr-4">
                                <span class="font-bold text-slate-500 bg-white px-1.5 py-0.5 rounded shadow-sm text-xs">{{ $detail->quantity }}x</span>
                                <span class="text-slate-600 font-medium">{{ $detail->product->name }}</span>
                            </div>
                            <span class="font-semibold text-slate-500 whitespace-nowrap text-xs">
                                Rp {{ number_format($detail->sub_total, 0, ',', '.') }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Total -->
            <div class="flex flex-row lg:flex-col justify-between items-center lg:items-end gap-3 w-full lg:w-3/12 border-t lg:border-t-0 border-slate-100 pt-4 lg:pt-0">
                <div class="text-left lg:text-right">
                    <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-0.5">Total Dibayar</p>
                    <p class="text-lg font-black text-slate-700">
                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                    </p>
                </div>
            </div>

        </div>
    @endforeach

    <!-- Pesan jika filter tidak menemukan data -->
    <div id="noHistoryMessage" class="hidden text-center py-8 text-slate-500 bg-white rounded-xl border border-slate-200 border-dashed">
        Tidak ada riwayat pesanan pada tanggal yang dipilih.
    </div>
    
    <!-- Pesan jika tidak ada riwayat sama sekali -->
    @if($orders->whereNotNull('selesai_pada')->isEmpty())
        <div class="text-center py-8 text-slate-500 bg-white rounded-xl border border-slate-200 border-dashed">
            Belum ada riwayat pesanan yang selesai.
        </div>
    @endif
</div>