@extends("app")
@section("content")
    <form class="w-1/4 mx-auto p-5 pt-40" method="POST">
        @csrf
        <h1 class="text-2xl font-bold mb-4 text-center">Login Admin</h1>
        <label class="mt-2">Username</label>
        <input class="border-2 w-full mt-2 px-2 py-1" name="username">
        <label class="mt-2">Password</label>
        <input class="border-2 w-full mt-2 px-2 py-1" type="password" name="password">
        <div class="flex justify-center">
            <button class="border mt-2 bg-blue-400 text-white px-3 py-1 rounded" type="submit">Login</button>
        </div>
    </form>
@endsection
