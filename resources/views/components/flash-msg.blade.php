@if (session('success') || session('error'))
<div id="flash-message-container" class="fixed top-5 right-5 z-50 w-full max-w-sm flex flex-col gap-3">

    @if (session('success'))
        <div
            class="flash-message opacity-0 translate-x-10 transition-all duration-300 relative overflow-hidden bg-white border-l-4 border-green-600 shadow-lg rounded-lg p-4 flex items-start gap-3"
        >
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-semibold text-green-800">Berhasil</p>
                <p class="text-sm text-gray-600">{{ session('success') }}</p>
            </div>
            <button type="button" class="flash-close text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="flash-progress absolute bottom-0 left-0 h-1 bg-green-500 w-full"></div>
        </div>
    @endif

    @if (session('error'))
        <div
            class="flash-message opacity-0 translate-x-10 transition-all duration-300 relative overflow-hidden bg-white border-l-4 border-red-600 shadow-lg rounded-lg p-4 flex items-start gap-3"
        >
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-semibold text-red-800">Gagal</p>
                <p class="text-sm text-gray-600">{{ session('error') }}</p>
            </div>
            <button type="button" class="flash-close text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="flash-progress absolute bottom-0 left-0 h-1 bg-red-500 w-full"></div>
        </div>
    @endif

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const duration = 5000; // 5 detik
        const messages = document.querySelectorAll('.flash-message');

        messages.forEach(function (msg) {
            // Animasi masuk
            requestAnimationFrame(() => {
                msg.classList.remove('opacity-0', 'translate-x-10');
            });

            // Animasi progress bar
            const progressBar = msg.querySelector('.flash-progress');
            if (progressBar) {
                progressBar.style.transition = `width ${duration}ms linear`;
                requestAnimationFrame(() => {
                    progressBar.style.width = '0%';
                });
            }

            // Auto hilang setelah 5 detik
            const timeout = setTimeout(() => {
                closeMessage(msg);
            }, duration);

            // Tombol close manual
            const closeBtn = msg.querySelector('.flash-close');
            closeBtn.addEventListener('click', function () {
                clearTimeout(timeout);
                closeMessage(msg);
            });
        });

        function closeMessage(msg) {
            msg.classList.add('opacity-0', 'translate-x-10');
            setTimeout(() => {
                msg.remove();
            }, 300);
        }
    });
</script>
@endif