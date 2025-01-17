<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>{{ $user->name }}</title>
    </head>
    <body class="overflow-x-hidden mt-[50px]">
        @include("layouts.header")
        <section class="flex flex-col gap-2 w-full px-[40px] py-[10px]">
            <div class="flex items-center gap-2">
                <h2 class="text-xl font-semibold">Postingan Oleh {{ $user->name }} <span class="text-base font-normal">{{ $user->username }}</span></h2>
            </div>
            @forelse ($posts as $post)
            <div class="recipe-card flex gap-3 p-3 border-[1px] border-gray-500 rounded-md h-[140px]">
                <div class="h-full aspect-square">
                    <img src="{{ "\\images\\".$post->thumbnail }}" alt="" class="w-full h-full object-cover rounded-md">
                </div>
                <div>
                    <a href="/posts/{{ $post->slug }}"><h2 class="text-xl font-semibold hover:text-gray-500">{{ $post->title }}</h2></a>
                    <p class="">{{ $post->description }}</p>
                </div>
            </div>
            @empty
                <p>Pengguna ini belum membuat postingan</p>
            @endforelse
        </section>
    </body>
</html>