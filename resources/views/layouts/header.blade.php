<nav class="bg-orange-300 border-b-[2px] border-black px-4 py-[6px] flex justify-between select-none">
    <div>
        <a href="/">
            <img src="{{ asset('assets/img/mudah masak.png') }}" alt="Mudah Masak Logo" class="w-20">
        </a>
    </div>
    <div class="flex gap-6 items-center">
        <a href="" class="font-semibold text-xl hover:text-orange-400">Resep Populer</a>
        <a href="" class="font-semibold text-xl hover:text-orange-400">Bahan Populer</a>
        <a href="" class="font-semibold text-xl hover:text-orange-400">Komunitas</a>
    </div>
    <div class="flex items-center gap-2">
        <div class="flex border-[1px] border-black p-1 rounded-3xl gap-1">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
            <form action="">
                <input type="text" name="query" id="id" placeholder="Cari Resep" class="bg-orange-300 placeholder-black focus:outline-none">
            </form>
        </div>
        @if (!Request::is('login'))
            <a href="/login" class="border-[1px] border-black py-1 px-3 rounded-lg hover:bg-orange-400 font-semibold">Masuk</a>
        @endif
    </div>
</nav>