<x-layout title="{{ config('app.name') }}">
    <div class="grid grid-cols-2 mx-auto px-8 py-10">
        <div class="flex flex-col gap-2">
            <div class="flex gap-4">
                <span>Freshly made</span>
                <span>Melt</span>
                <span>Butter</span>
            </div>

            <div class="">
                <p class="text-8xl">Pinch me</p>
                <p class="text-6xl">Im Dreaming</p>
            </div>

            <div class="mt-4">
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis praesentium omnis maiores itaque quod quis ipsa aspernatur est suscipit reiciendis?</span>
            </div>

            <div class="mt-4">
                <a class="px-4 bg-amber-400 py-2 rounded-full ring-2 ring-amber-600 hover:bg-amber-600 hover:text-white hover:ring-amber-400 transition-all duration-300 hover:upper " href="{{ route('page.menu') }}">Go to menu</a>
            </div>

        </div>
    </div>
</x-layout>
