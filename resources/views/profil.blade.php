<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>{{ auth()->user()->name }}</title>
    </head>
    <body class="overflow-x-hidden mt-[50px]">
        @include("layouts.header")
        <section class="w-full px-[40px] py-[10px]">
            <h2 class="text-xl font-semibold">Profil Anda</h2>
            <table class="gap-2">
                <tr>
                    <td>Nama</td>
                    <td class="block border-[1px] border-black rounded-lg p-1 ml-5 mb-1">{{ auth()->user()->name }}</td>
                    <td><a href="" class="block px-2"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></a></td>
                </tr>
                <tr>
                    <td>Nama Pengguna</td>
                    <td class="block border-[1px] border-black rounded-lg p-1 ml-5 mb-1">{{ auth()->user()->username }}</td>
                    <td><a href="" class="block px-2"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></a></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td class="block border-[1px] border-black rounded-lg p-1 ml-5 mb-1">{{ auth()->user()->email }}</td>
                    <td><a href="" class="block px-2"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></a></td>
                </tr>
            </table>
        </section>
        <section class="flex flex-col gap-2 w-full px-[40px] py-[10px]">
            <div class="flex items-center gap-2">
                <h2 class="text-xl font-semibold">Postingan Anda</h2>
                <a href="/create-post"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-square-rounded-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" /><path d="M15 12h-6" /><path d="M12 9v6" /></svg></a>
            </div>
            <div class="recipe-card flex gap-3 p-3 border-[1px] border-gray-500 rounded-md h-[140px]">
                <div class="h-full aspect-square">
                    <img src="{{ asset('assets/img/pexels-anntarazevich-6937455.jpg') }}" alt="" class="w-full h-full object-cover rounded-md">
                </div>
                <div>
                    <h2 class="text-xl font-semibold">Nasi Goreng Mas Andre</h2>
                    <p class="max-h-[40px] overflow-y-scroll">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores dignissimos provident at. Minima repellat voluptatem harum ullam molestias maxime vitae et, magnam quo porro repellendus non beatae. Quae, adipisci placeat.</p>
                    <p><span class="font-medium">Bahan : </span>Nasi, Cabai Merah, Bawang Putih, Bawang Merah, Lada, Saus Tiram, Garam, Micin</p>
                    <p><span class="font-medium">Alat : </span>Wajan, Sodet</p>
                </div>
            </div>
            <div class="recipe-card flex gap-3 p-3 border-[1px] border-gray-500 rounded-md h-[140px]">
                <div class="h-full aspect-square">
                    <img src="{{ asset('assets/img/pexels-anntarazevich-6937455.jpg') }}" alt="" class="w-full h-full object-cover rounded-md">
                </div>
                <div>
                    <h2 class="text-xl font-semibold">Nasi Goreng Mas Andre</h2>
                    <p class="max-h-[40px] overflow-y-scroll">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores dignissimos provident at. Minima repellat voluptatem harum ullam molestias maxime vitae et, magnam quo porro repellendus non beatae. Quae, adipisci placeat.</p>
                    <p><span class="font-medium">Bahan : </span>Nasi, Cabai Merah, Bawang Putih, Bawang Merah, Lada, Saus Tiram, Garam, Micin</p>
                    <p><span class="font-medium">Alat : </span>Wajan, Sodet</p>
                </div>
            </div>
            <div class="recipe-card flex gap-3 p-3 border-[1px] border-gray-500 rounded-md h-[140px]">
                <div class="h-full aspect-square">
                    <img src="{{ asset('assets/img/pexels-anntarazevich-6937455.jpg') }}" alt="" class="w-full h-full object-cover rounded-md">
                </div>
                <div>
                    <h2 class="text-xl font-semibold">Nasi Goreng Mas Andre</h2>
                    <p class="max-h-[40px] overflow-y-scroll">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores dignissimos provident at. Minima repellat voluptatem harum ullam molestias maxime vitae et, magnam quo porro repellendus non beatae. Quae, adipisci placeat.</p>
                    <p><span class="font-medium">Bahan : </span>Nasi, Cabai Merah, Bawang Putih, Bawang Merah, Lada, Saus Tiram, Garam, Micin</p>
                    <p><span class="font-medium">Alat : </span>Wajan, Sodet</p>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-2 w-full px-[40px] py-[10px]">
            <div class="flex items-center gap-2">
                <h2 class="text-xl font-semibold">Resep Anda</h2>
                <a href="/create-post"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-square-rounded-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" /><path d="M15 12h-6" /><path d="M12 9v6" /></svg></a>
            </div>
            <div class="recipe-card flex gap-3 p-3 border-[1px] border-gray-500 rounded-md h-[140px]">
                <div class="h-full aspect-square">
                    <img src="{{ asset('assets/img/pexels-anntarazevich-6937455.jpg') }}" alt="" class="w-full h-full object-cover rounded-md">
                </div>
                <div>
                    <h2 class="text-xl font-semibold">Nasi Goreng Mas Andre</h2>
                    <p class="max-h-[40px] overflow-y-scroll">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores dignissimos provident at. Minima repellat voluptatem harum ullam molestias maxime vitae et, magnam quo porro repellendus non beatae. Quae, adipisci placeat.</p>
                    <p><span class="font-medium">Bahan : </span>Nasi, Cabai Merah, Bawang Putih, Bawang Merah, Lada, Saus Tiram, Garam, Micin</p>
                    <p><span class="font-medium">Alat : </span>Wajan, Sodet</p>
                </div>
            </div>
            <div class="recipe-card flex gap-3 p-3 border-[1px] border-gray-500 rounded-md h-[140px]">
                <div class="h-full aspect-square">
                    <img src="{{ asset('assets/img/pexels-anntarazevich-6937455.jpg') }}" alt="" class="w-full h-full object-cover rounded-md">
                </div>
                <div>
                    <h2 class="text-xl font-semibold">Nasi Goreng Mas Andre</h2>
                    <p class="max-h-[40px] overflow-y-scroll">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores dignissimos provident at. Minima repellat voluptatem harum ullam molestias maxime vitae et, magnam quo porro repellendus non beatae. Quae, adipisci placeat.</p>
                    <p><span class="font-medium">Bahan : </span>Nasi, Cabai Merah, Bawang Putih, Bawang Merah, Lada, Saus Tiram, Garam, Micin</p>
                    <p><span class="font-medium">Alat : </span>Wajan, Sodet</p>
                </div>
            </div>
            <div class="recipe-card flex gap-3 p-3 border-[1px] border-gray-500 rounded-md h-[140px]">
                <div class="h-full aspect-square">
                    <img src="{{ asset('assets/img/pexels-anntarazevich-6937455.jpg') }}" alt="" class="w-full h-full object-cover rounded-md">
                </div>
                <div>
                    <h2 class="text-xl font-semibold">Nasi Goreng Mas Andre</h2>
                    <p class="max-h-[40px] overflow-y-scroll">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores dignissimos provident at. Minima repellat voluptatem harum ullam molestias maxime vitae et, magnam quo porro repellendus non beatae. Quae, adipisci placeat.</p>
                    <p><span class="font-medium">Bahan : </span>Nasi, Cabai Merah, Bawang Putih, Bawang Merah, Lada, Saus Tiram, Garam, Micin</p>
                    <p><span class="font-medium">Alat : </span>Wajan, Sodet</p>
                </div>
            </div>
        </section>
    </body>
</html>