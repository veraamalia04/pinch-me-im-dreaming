<x-layout title="Login">
    <div class="justify-center items-center flex flex-col px-4">
        <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md border border-amber-200 justify-center flex flex-col gap-4">
            <div class="text-center mb-8">
                <div class="mx-auto mb-4 w-14 h-14 rounded-full bg-amber-800 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-amber-900">Login Page</h3>
                <p class="text-amber-700 text-sm mt-1">Silakan masuk untuk melanjutkan</p>
            </div>

            <form action="{{ route('post.login') }}" class="flex flex-col gap-5" method="POST">
                @csrf

                <div class="flex flex-col gap-1">
                    <label for="username" class="text-sm font-medium text-amber-900">Username</label>
                    <input
                        id="username"
                        type="text"
                        name="username"
                        placeholder="Masukkan username"
                        class="border border-amber-300 rounded-lg px-4 py-2 text-amber-900 placeholder-amber-400
                               focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600
                               bg-amber-50 transition"
                    >
                    @error('username')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label for="password" class="text-sm font-medium text-amber-900">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        class="border border-amber-300 rounded-lg px-4 py-2 text-amber-900 placeholder-amber-400
                               focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600
                               bg-amber-50 transition"
                    >
                    @error('password')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="mt-2 bg-amber-800 hover:bg-amber-900 active:bg-amber-950 text-white font-semibold
                           py-2.5 rounded-lg transition shadow-md hover:shadow-lg"
                >
                    Login
                </button>
            </form>

        <a href="{{ route('page.register') }}" class="text-center text-amber-800 font-semibold hover:underline">Register</a>

        </div>

    </div>
</x-layout>