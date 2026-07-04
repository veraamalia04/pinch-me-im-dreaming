<x-layout title="Daftar ">
    <form action="{{ route('post.register') }}" method="POST">
        @csrf
        <x-form.input name="email" label="email" required />
        <button>Daftar</button>
    </form>
</x-layout>