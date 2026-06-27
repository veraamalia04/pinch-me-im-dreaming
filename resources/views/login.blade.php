<x-layout title="Login">
    <div class="justify-center items-center flex flex-col min-h-screen">
        <h3>Login Page</h3>
        <form action="{{ route('post.login') }}" class="flex flex-col" method="POST">
            @csrf
            <div class="">
                <label for="username">Username</label>
                <input id="username" type="text" name="username">
            </div>

            <div class="">
                <label for="password">Password</label>
                <input id="password" type="password" name="password">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</x-layout>