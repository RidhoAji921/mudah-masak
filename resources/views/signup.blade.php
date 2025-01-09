<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Buat Akun</title>
</head>
<body class="overflow-x-hidden">
    @include("layouts.header")
    <section class="flex items-center justify-center my-16">
        <form action="/signup" method="post" class="flex flex-col w-[80%] border-[1px] border-gray-700 p-3 rounded-2xl gap-2">
            @csrf
            <h3 class="self-center">Buat akun</h3>
            <div class="flex flex-col">
                <label for="email">Email</label>
                <div class="flex border-2 {{ $errors->has('email') ? 'border-red-700' : 'border-gray-300' }} focus-within:border-orange-300 p-1 rounded-lg gap-1">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                    <input type="email" id="email" name="email" required class="w-full focus:outline-none" value="{{ old('email') }}" autofocus>
                </div>
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="name">Nama Anda</label>
                <div class="flex border-2  {{ $errors->has('name') ? 'border-red-700' : 'border-gray-300' }} focus-within:border-orange-300 p-1 rounded-lg gap-1">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                    <input type="text" id="name" name="name" required class="w-full focus:outline-none" value="{{ old('name') }}">
                </div>
                <ul class="list-disc list-inside ml-2">
                    <li>Adalah nama yang ditampilkan</li>
                    <li>Maksimal 255 karakter</li>
                    <li>Hanya mengandung huruf, spasi, dan angka</li>
                </ul>
            </div>
            <div class="flex flex-col">
                <label for="username">Nama Pengguna</label>
                <div class="flex border-2  {{ $errors->has('username') ? 'border-red-700' : 'border-gray-300' }} focus-within:border-orange-300 p-1 rounded-lg gap-1">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                    <input type="text" id="username" name="username" required class="w-full focus:outline-none" value="{{ old('username') }}">
                </div>
                @error('username')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
                <ul class="list-disc list-inside ml-2">
                    <li>Adalah nama identitas anda</li>
                    <li>Minimal 3, Maksimal 255 karakter</li>
                </ul>
            </div>
            <div class="flex flex-col">
                <label for="password">Kata Sandi</label>
                <div class="flex border-2  {{ $errors->has('password') ? 'border-red-700' : 'border-gray-300' }} focus-within:border-orange-300 p-1 rounded-lg gap-1">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-lock"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" /><path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" /><path d="M8 11v-4a4 4 0 1 1 8 0v4" /></svg>
                    <input type="password" id="password" name="password" required class="w-full focus:outline-none">
                </div>
                <ul class="list-disc list-inside ml-2">
                    <li>Minimal 5, Maksimal 255 karakter</li>
                </ul>
            </div>
            <div class="flex items-center flex-col">
                <input type="submit" value="Buat akun" class="cursor-pointer p-1 border-[1px] border-black rounded-lg w-fit hover:bg-orange-300">
                <p class="font-medium">Sudah ada akun? Masuk <span class="text-gray-600 hover:text-orange-300"><a href="/login">di sini</a></span></p>
            </div>
        </form>
    </section>
</body>
</html>