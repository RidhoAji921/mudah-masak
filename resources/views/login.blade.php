<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="overflow-x-hidden">
    @include("layouts.header")
    @if (session()->has('signupSuccess'))
        <div class="flex w-full justify-center">
            <div class="p-2 mt-2 bg-green-300 rounded-lg">
                <p>{{ session('signupSuccess') }}</p>
            </div>
        </div>
    @endif
    @if (session()->has('loginError'))
        <div class="flex w-full justify-center">
            <div class="p-2 mt-2 bg-red-300 rounded-lg">
                <p>{{ session('loginError') }}</p>
            </div>
        </div>
    @endif
    <section class="flex items-center justify-center mt-16">
        <form action="/login" method="post" class="flex flex-col w-[80%] border-[1px] border-gray-700 p-3 rounded-2xl gap-2">
            <h3 class="self-center">Masuk ke akun</h3>
            @csrf
            <div class="flex flex-col">
                <label for="login">Nama Pengguna atau Email</label>
                <div class="flex border-2 border-gray-300 focus-within:border-orange-300 p-1 rounded-lg gap-1">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                    <input type="text" id="login" name="login" class="w-full focus:outline-none" required autofocus>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="password">Kata Sandi</label>
                <div class="flex border-2 border-gray-300 focus-within:border-orange-300 p-1 rounded-lg gap-1">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-lock"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" /><path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" /><path d="M8 11v-4a4 4 0 1 1 8 0v4" /></svg>
                    <input type="password" id="password" name="password" class="w-full focus:outline-none" required>
                </div>
            </div>
            <div class="flex items-center flex-col">
                <input type="submit" value="Masuk" class="cursor-pointer p-1 border-[1px] border-black rounded-lg w-fit hover:bg-orange-300">
                <p class="font-medium">Belum ada akun? Bikin akun <span class="text-gray-600 hover:text-orange-300"><a href="/signup">di sini</a></span></p>
            </div>
        </form>
    </section>
</body>
</html>