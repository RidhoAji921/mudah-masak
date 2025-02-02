<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css" />
        @vite('resources/css/app.css')
        <title>{{ $recipe->name }}</title>
    </head>
    <body class="overflow-x-hidden mt-[50px]">
        @include("layouts.header")
        <section class="w-full h-[60vh] bg-black flex justify-center items-center">
            <img src="{{ "\\images\\".$recipe->user_id."\\".$recipe->thumbnail }}" alt="{{ $recipe->slug }}" class="h-full">
        </section>
        <section class="py-2 px-3">
            {{-- <div class="flex flex-wrap gap-2">
                @foreach ($post->categories as $category)
                    <div class="p-1 bg-orange-300 rounded-md">{{ $category->category }}</div>
                @endforeach
            </div> --}}
            <div class="flex justify-between">
                <div class="flex gap-2">
                    <h2 class="text-xl font-semibold">{{ $recipe->name }}</h2>
                    <h2 class="text-xl font-normal">oleh <a href="{{ auth()->id() == $recipe->user_id? "/profile" : "/user/".$recipe->author->username }}" class="hover:text-gray-700">{{ $recipe->author->name }}</a></h2>
                    {{-- @if (auth()->id() == $post->user_id)
                    <div class="flex">
                        <a href=""><svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg></a>
                        <a href=""><svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></a>
                    </div>
                    @endif --}}
                </div>
                <div class="flex gap-2">
                    <div class="flex gap-1">
                        <p>10</p>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-thumb-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3" /></svg>
                    </div>
                    <div class="flex gap-1">
                        <p>100</p>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 20l1.3 -3.9c-2.324 -3.437 -1.426 -7.872 2.1 -10.374c3.526 -2.501 8.59 -2.296 11.845 .48c3.255 2.777 3.695 7.266 1.029 10.501c-2.666 3.235 -7.615 4.215 -11.574 2.293l-4.7 1" /></svg>
                    </div>
                </div>
            </div>
            <p>{{ $recipe->description }}</p>
        </section>
        <section class="py-2 px-3">
            <h2 class="text-xl font-medium">Alat-alat</h2>
            <ul>
                @foreach ($recipe->tools as $tool)
                <li class="list-inside list-disc">{{ $tool->name }}</li>
                @endforeach
            </ul>
        </section>
        <section class="py-2 px-3">
            <h2 class="text-xl font-medium">Bahan</h2>
            <table>
                <tr>
                    <th>Bahan</th>
                    <th class="pl-7">Jumlah</th>
                </tr>
                @foreach ($recipe->ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->name }}</td>
                    <td class="pl-7">{{ $ingredient->pivot->amount }} {{ $units[$ingredient->pivot->unit_id] }}</td>
                </tr>
                @endforeach
            </table>
        </section>
        <section class="py-2 px-3">
            <h2 class="text-xl font-medium">Langkah-langkah</h2>
            <ul class="flex flex-col gap-1">
                @foreach ($recipe->steps as $step)
                <div class="w-full border-black border p-3 rounded-md">
                    <li class="list-inside list-decimal font-semibold">{{ $step->step_name }}</li>
                    <p>{{ $step->description }}</p>
                    @if ($step->image)
                        <img class="h-[200px]" src="{{ "\\images\\".$recipe->user_id."\\".$step->image }}" alt="{{ $step->step_name }}">
                    @endif
                </div>
                @endforeach
            </ul>
        </section>
    </body>
</html>