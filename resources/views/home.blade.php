<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Mudah Masak</title>
    </head>
    <body class="overflow-x-hidden mt-[50px]">
        @include("layouts.header")
        <section>
            <div class="relative">
                <div class="flex animate-scroll-bounce ">
                    <img src="{{ asset('assets/img/pexels-olly-3772534.jpg') }}" alt="" class="h-[40vh]">
                    <img src="{{ asset('assets/img/pexels-anna-nekrashevich-7552725.jpg') }}" alt="" class="h-[40vh]">
                    <img src="{{ asset('assets/img/pexels-ivan-samkov-4783980.jpg') }}" alt="" class="h-[40vh]">
                    <img src="{{ asset('assets/img/pexels-olly-3770002.jpg') }}" alt="" class="h-[40vh]">
                    <img src="{{ asset('assets/img/pexels-andres-ayrton-6578899.jpg') }}" alt="" class="h-[40vh]">
                    <img src="{{ asset('assets/img/pexels-saulo-leite-1491182-17637081.jpg') }}" alt="" class="h-[40vh]">
                    <img src="{{ asset('assets/img/pexels-mikhail-nilov-6957990.jpg') }}" alt="" class="h-[40vh]">
                </div>
                @auth
                    <div class="absolute flex flex-col items-center justify-center inset-0 bg-vignette">
                        <p class="text-5xl font-extrabold text-white">Karena Masak Itu Mudah</p>
                        <div class="flex gap-5">
                            <a href="/create-post" class="text-xl font-extrabold text-white hover:text-gray-300 mt-3">Buat Postingan</a>
                            <a href="/recipe/create" class="text-xl font-extrabold text-white hover:text-gray-300 mt-3">Buat Resep</a>
                            <a href="" class="text-xl font-extrabold text-white hover:text-gray-300 mt-3">Koleksi Anda</a>
                        </div>
                    </div>
                @else
                    <div class="absolute flex flex-col items-center justify-center inset-0 bg-vignette">
                        <p class="text-5xl font-extrabold text-white">Karena Masak Itu Mudah</p>
                        <p class="text-xl text-white font-semibold"><a href="/signup" class="font-extrabold hover:text-gray-300 mt-3">Mulai jadi pengguna</a> atau <a href="/login" class="font-extrabold hover:text-gray-300 mt-3">Masuk</a></p>
                    </div>
                @endauth
            </div>
        </section>
        <section class="px-40 py-1 flex flex-col gap-2">
            <div class="flex items-center">
                <h2 class="text-xl font-semibold">Postingan Terbaru</h2>
                <a href="/newest-posts"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M13 18l6 -6" /><path d="M13 6l6 6" /></svg></a>
            </div>
            <div class="grid grid-cols-4 gap-1">
                @forelse ($latestPosts as $post)
                <a href="/posts/{{ $post->slug }}" class="relative aspect-square">
                    <img src="{{ "\\images\\".$post->thumbnail }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-end justify-center bg-black bg-opacity-20 opacity-0 hover:opacity-100 transition-opacity text-white text-xl font-bold pb-3">
                        <p class="text-center">{{ $post->title }}</p>
                    </div>
                </a>
                @empty
                    <p>Tidak ada postingan terbaru</p>
                @endforelse
                {{-- <a href="/post" class="aspect-square"><img src="{{ asset("assets/img/pexels-catscoming-750948.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover"></a>
                <a href="/post" class="aspect-square"><img src="{{ asset("assets/img/pexels-anntarazevich-6937455.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover"></a>
                <a href="/post" class="aspect-square"><img src="{{ asset("assets/img/pexels-ivan-samkov-4783980.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover"></a>
                <a href="/post" class="aspect-square"><img src="{{ asset("assets/img/pexels-mikhail-nilov-6957990.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover"></a> --}}
            </div>
        </section>
        <section class="px-40 py-1 flex flex-col gap-2">
            <h2 class="text-xl font-semibold">Rekomendasi Resep</h2>
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
        <section class="px-40 py-1">
            <h2 class="text-xl font-semibold">Bahan Populer</h2>
            <div class="grid grid-cols-5 gap-1">
                <div class="relative aspect-square border-2 border-gray-700">
                    <img src="{{ asset("assets/img/pexels-catscoming-750948.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold">
                        Bawang Putih
                    </div>
                </div>
                <div class="relative aspect-square border-2 border-gray-700">
                    <img src="{{ asset("assets/img/pexels-catscoming-750948.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold">
                        Bawang Putih
                    </div>
                </div>
                <div class="relative aspect-square border-2 border-gray-700">
                    <img src="{{ asset("assets/img/pexels-catscoming-750948.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold">
                        Bawang Putih
                    </div>
                </div>
                <div class="relative aspect-square border-2 border-gray-700">
                    <img src="{{ asset("assets/img/pexels-catscoming-750948.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold">
                        Bawang Putih
                    </div>
                </div>
                <div class="relative aspect-square border-2 border-gray-700">
                    <img src="{{ asset("assets/img/pexels-catscoming-750948.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold">
                        Bawang Putih
                    </div>
                </div>
                <div class="relative aspect-square border-2 border-gray-700">
                    <img src="{{ asset("assets/img/pexels-catscoming-750948.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold">
                        Bawang Putih
                    </div>
                </div>
                <div class="relative aspect-square border-2 border-gray-700">
                    <img src="{{ asset("assets/img/pexels-catscoming-750948.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold">
                        Bawang Putih
                    </div>
                </div>
                <div class="relative aspect-square border-2 border-gray-700">
                    <img src="{{ asset("assets/img/pexels-catscoming-750948.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold">
                        Bawang Putih
                    </div>
                </div>
                <div class="relative aspect-square border-2 border-gray-700">
                    <img src="{{ asset("assets/img/pexels-catscoming-750948.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold">
                        Bawang Putih
                    </div>
                </div>
                <div class="relative aspect-square border-2 border-gray-700">
                    <img src="{{ asset("assets/img/pexels-catscoming-750948.jpg") }}" alt="Gambar 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-bold">
                        Bawang Putih
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
