<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>{{ $query }}</title>
    </head>
    <body class="overflow-x-hidden mt-[50px]">
        @include("layouts.header")
        @include("layouts.search-menu")
        <section class="flex flex-col w-full px-2 gap-2">
            <h2 class="text-xl font-semibold">Hasil untuk pencarian "{{ $query }}"</h2>
            @forelse ($posts as $post)
            <div class="recipe-card flex gap-3 p-3 border-[1px] border-gray-500 rounded-md h-[140px]">
                <div class="h-full aspect-square">
                    <img src="{{ "\\images\\".$post->thumbnail }}" alt="" class="w-full h-full object-cover rounded-md">
                </div>
                <div>
                    <a href="/posts/{{ $post->slug }}"><h2 class="text-xl font-semibold hover:text-gray-500">{{ $post->title }}</h2></a>
                    <p class="max-h-[40px] overflow-y-scroll">{{ $post->description }}</p>
                </div>
            </div>
            @empty
            <div>
                <p class="text-xl font-semibold">Tidak ada postingan dengan kata kunci "{{ $query }}"</p>
                <p class="text-xl">Ganti kata kunci atau perjelas kata pencarian</p>
            </div>
            @endforelse
        </section>
    </body>
</html>