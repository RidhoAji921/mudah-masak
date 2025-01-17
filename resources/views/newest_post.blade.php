<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Postingan Terbaru</title>
    </head>
    <body class="overflow-x-hidden mt-[50px]">
        @include("layouts.header")
        <section class="px-40 py-1 flex flex-col gap-2">
            <div class="flex items-center">
                <h2 class="text-xl font-semibold">Postingan Terbaru</h2>
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
            </div>
        </section>
        <div class="pagination px-40">
            {{ $latestPosts->links() }}
        </div>
    </body>
</html>