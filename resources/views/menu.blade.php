<x-layout title="Menu">

<style>
@import url('https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,500&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap');
.font-display{font-family:'Fraunces',serif}
.font-body{font-family:'Plus Jakarta Sans',sans-serif}
.font-price{font-family:'Space Mono',monospace}

.card-rise{animation:riseUp .5s ease both}
@keyframes riseUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
.toast-pop{animation:popIn .25s ease both}
@keyframes popIn{from{opacity:0;transform:translate(-50%,10px)}to{opacity:1;transform:translate(-50%,0)}}

/* Menyembunyikan panah default pada input type number */
.qty-input::-webkit-outer-spin-button,
.qty-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.qty-input {
    -moz-appearance: textfield;
}
</style>

<div class="font-body bg-[#FBF2E3] min-h-screen">

    <section class="griddle-texture bg-[#3A2415] px-6 py-16 sm:py-20">
        <div class="max-w-5xl mx-auto text-center">
            <span class="font-price text-[#C9963B] text-xs tracking-[0.35em] uppercase">Papan Menu</span>
            <h1 class="font-display italic text-[#FBF2E3] text-4xl sm:text-6xl mt-3 leading-tight">
                Kue Cubit &amp; laba-laba
            </h1>
            <p class="text-[#E4CFB4] mt-4 max-w-xl mx-auto text-sm sm:text-base">
                Dipanggang di atas cetakan panas, dituang satu per satu, dicubit dengan sabar. Pilih rasa favoritmu di bawah ini.
            </p>
            <span class="inline-block mt-5 bg-[#6B4226] text-[#FBF2E3] font-price text-xs px-4 py-2 rounded-full">
                {{ count($products) }} varian tersedia
            </span>
        </div>
    </section>

    <div class="sticky top-0 z-20 bg-[#FBF2E3]/90 backdrop-blur border-b border-[#E4CFB4] px-6 py-4">
        <div class="max-w-5xl mx-auto relative">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#8A5A34]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="7"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input id="cariMenu" type="text" placeholder="Cari kue cubit, laba-laba, rasa favoritmu..."
                class="w-full font-body bg-white border-2 border-[#E4CFB4] focus:border-[#C9963B] focus:outline-none rounded-full py-3 pl-12 pr-5 text-[#3A2415] placeholder-[#B08A63] transition-colors" />
        </div>
    </div>

    <section class="px-6 py-10">
        <div class="max-w-5xl mx-auto">

            <div id="gridMenu" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($products as $index => $product)
                    <div data-name="{{ strtolower($product->name) }}" data-deskripsi="{{ strtolower($product->deskripsi) }}"
                        class="kartu-produk card-rise bg-white rounded-3xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center"
                        style="animation-delay: {{ min($index, 12) * 40 }}ms">

                        <div class="cubit-frame w-28 h-28 mt-3 mb-4">
                            <img src="{{ $product->foto_url }}" alt="{{ $product->name }}"
                                class="w-28 h-28 rounded-full object-cover">
                        </div>

                        <h3 class="font-display text-[#3A2415] text-lg leading-snug">{{ $product->name }}</h3>
                        <p class="text-[#8A5A34] text-sm mt-2 leading-relaxed flex-grow">{{ $product->deskripsi }}</p>

                        <div class="font-price text-[#C1443C] text-lg mt-4 mb-5">
                            Rp{{ number_format($product->current_price ?? 0, 0, ',', '.') }}
                        </div>

                        <div class="w-full mt-auto">
                            @auth
                                <form action="{{ route('post.box.store_to_box') }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    
                                    <!-- Kontrol Plus Minus -->
                                    <div class="flex items-center justify-between border-2 border-[#E4CFB4] rounded-full p-1 mb-3 bg-[#FBF2E3]/30">
                                        <button type="button" onclick="updateQty(this, -1)" class="w-8 h-8 flex justify-center items-center rounded-full text-[#8A5A34] hover:bg-[#E4CFB4] transition-colors focus:outline-none">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                        </button>
                                        
                                        <input type="number" name="quantity" value="1" min="1" class="qty-input w-12 text-center bg-transparent font-price text-[#3A2415] focus:outline-none font-bold" readonly>
                                        
                                        <button type="button" onclick="updateQty(this, 1)" class="w-8 h-8 flex justify-center items-center rounded-full text-[#8A5A34] hover:bg-[#E4CFB4] transition-colors focus:outline-none">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                        </button>
                                    </div>

                                    <!-- Tombol Submit -->
                                    <button type="submit" class="w-full bg-[#3A2415] hover:bg-[#6B4226] text-[#FBF2E3] font-body font-semibold text-sm rounded-full py-3 transition-colors shadow-md flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                        Tambah ke Box
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('page.login') }}"
                                    class="block w-full bg-[#E4CFB4] hover:bg-[#C9963B] text-[#3A2415] font-body font-semibold text-sm rounded-full py-3 transition-colors text-center">
                                    Masuk untuk Pesan
                                </a>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="kosongState" class="hidden text-center py-16">
                <div class="font-display italic text-2xl text-[#6B4226]">Yah, kuenya belum ketemu</div>
                <p class="text-[#8A5A34] text-sm mt-2">Coba kata kunci lain, mungkin rasa yang kamu mau ada di nama yang berbeda.</p>
            </div>

        </div>
    </section>

    <div id="toastBox" class="hidden fixed bottom-6 left-1/2 -translate-x-1/2 z-30 toast-pop bg-[#3A2415] text-[#FBF2E3] text-sm font-body px-5 py-3 rounded-full shadow-lg"></div>

</div>

<script>
// Fungsi untuk mengatur Plus & Minus Quantity
function updateQty(button, change) {
    // Mencari input di dalam form yang sama dengan tombol yang diklik
    let container = button.parentElement;
    let input = container.querySelector('.qty-input');
    let currentValue = parseInt(input.value) || 1;
    let newValue = currentValue + change;
    
    // Pastikan quantity tidak kurang dari 1
    if (newValue >= 1) {
        input.value = newValue;
    }
}

(function(){
    var input = document.getElementById('cariMenu');
    var kartu = document.querySelectorAll('.kartu-produk');
    var kosong = document.getElementById('kosongState');

    input.addEventListener('input', function(){
        var kata = input.value.trim().toLowerCase();
        var tampil = 0;
        kartu.forEach(function(el){
            var cocok = el.dataset.name.includes(kata) || el.dataset.deskripsi.includes(kata);
            el.classList.toggle('hidden', !cocok);
            if (cocok) tampil++;
        });
        kosong.classList.toggle('hidden', tampil !== 0);
    });

    var toast = document.getElementById('toastBox');
    var timerToast = null;
    function tampilkanToast(pesan){
        toast.textContent = pesan;
        toast.classList.remove('hidden');
        clearTimeout(timerToast);
        timerToast = setTimeout(function(){
            toast.classList.add('hidden');
        }, 2200);
    }

    document.querySelectorAll('.tombol-tambah').forEach(function(tombol){
        tombol.addEventListener('click', function(){
            tampilkanToast('Fitur tambah ke box segera hadir');
        });
    });
})();
</script>

</x-layout>