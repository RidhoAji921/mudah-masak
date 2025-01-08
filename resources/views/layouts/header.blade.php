<nav class="bg-orange-300 border-b-[2px] border-black px-4 py-[6px] flex justify-between select-none">
    <div>
        <a href="/">
            <img src="{{ asset('assets/img/mudah masak.png') }}" alt="Mudah Masak Logo" class="w-20">
        </a>
    </div>
    @if (Route::currentRouteName() !== 'home')
        <div class="flex gap-6 items-center">
            <a href="" class="font-semibold text-xl hover:text-orange-400">Resep Populer</a>
            <a href="" class="font-semibold text-xl hover:text-orange-400">Bahan Populer</a>
            <a href="" class="font-semibold text-xl hover:text-orange-400">Komunitas</a>
        </div>
    @endif
    <div class="flex items-center gap-2">
        <div class="flex border-[1px] border-black p-1 rounded-3xl gap-1">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
            <form action="">
                <input type="text" name="query" id="id" placeholder="Cari Resep" class="bg-orange-300 placeholder-black focus:outline-none">
            </form>
        </div>
        @auth
            <p class="text-xl font-medium">Halo! {{ auth()->user()->name }}</p>
            <div class="grid grid-cols-2 gap-1">
                <a class="flex justify-center gap-1 border-[1px] border-black rounded-lg py-1 px-1 hover:bg-orange-400" href="">Profil<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg></a>
                <form action="/logout" method="post">
                    @csrf
                    <button class="flex justify-center gap-1 border-[1px] border-black rounded-lg py-1 px-1 hover:bg-orange-400" type="submit">Logout<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg></button>
                </form>
            </div>
        @else
            @if (!Request::is('login'))
                <a href="/login" class="border-[1px] border-black py-1 px-3 rounded-lg hover:bg-orange-400 font-semibold">Masuk</a>
            @endif
        @endauth
    </div>
</nav>