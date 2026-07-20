<x-layout title="Keranjang Belanja">
    <div class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Keranjang Belanja</h1>

        <!-- Container Keranjang -->
        <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
            
            <div class="p-6 space-y-6">
                @php $grandTotal = 0; @endphp

                @forelse ($boxDetails as $detail)
                    @php 
                        $subtotal = $detail->product->price * $detail->quantity;
                        $grandTotal += $subtotal;
                    @endphp

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between py-4 border-b border-gray-50 last:border-0 last:pb-0 gap-4" id="{{ $detail->id }}">
                        <div class="flex items-center space-x-4 flex-1">
                            <div class="w-20 h-20 flex-shrink-0">
                                <img src="{{ $detail->product->foto_url }}" alt="{{ $detail->product->name }}" class="w-full h-full object-cover rounded-lg shadow-sm border border-gray-100">
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-800">{{ $detail->product->name }}</h3>
                                <!-- Asumsi field harga di tabel product bernama 'price' -->
                                <p class="text-sm text-gray-500 mt-1">Rp {{ number_format($detail->sub_total, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between sm:justify-end space-x-6 sm:w-auto w-full">
                            
                            <!-- Kontrol Kuantitas -->
                            <div class="flex items-center border border-gray-200 rounded-lg">
                                <form action="{{ route('post.box.subtract_one_from_box', $detail->id) }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 text-gray-500 hover:text-gray-800 hover:bg-gray-100 rounded-l-lg transition focus:outline-none">
                                        &minus;
                                    </button>
                                </form>

                                <span class="px-4 py-1.5 text-gray-700 font-medium border-x border-gray-200 bg-gray-50">
                                    {{ $detail->quantity }}
                                </span>

                                <form action="{{ route('post.box.increase_one_to_box', $detail->id) }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 text-gray-500 hover:text-gray-800 hover:bg-gray-100 rounded-r-lg transition focus:outline-none">
                                        &plus;
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-400">
                        <p>Keranjang Anda masih kosong.</p>
                    </div>
                @endforelse
            </div>
            @if(count($boxDetails) > 0)
                <div class="bg-gray-50 p-6 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div>
                        <h2 class="text-gray-500 text-sm">Total Belanja</h2>
                        <p class="text-2xl font-bold text-gray-800">Rp {{ number_format($box->total_harga, 0, ',', '.') }}</p>
                    </div>
                    
                    <form action="{{ route('post.order.transfer_box_to_order') }}" method="POST" class="m-0 w-full sm:w-auto">
                        @csrf
                        <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg shadow-md transition duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Checkout Sekarang
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-layout>