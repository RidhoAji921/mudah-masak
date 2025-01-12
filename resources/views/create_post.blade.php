<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Buat Postingan</title>
    </head>
    <body class="overflow-x-hidden mt-[50px]">
        @include("layouts.header")
        <section class="w-full px-[120px] py-[20px]">
            <form action="">
                <div class="flex gap-2">
                    <label for="title">Judul Postingan</label>
                    <input type="text" name="title" id="title" class="border-b-[1px] border-black focus:border-b-2 focus:outline-none flex-1 box-border">
                </div>
                <table class="w-full">
                    <tr>
                        <td><label for="title">Judul Postingan</label></td>
                        <td><input type="text" name="title" id="title" class="w-full border-b-[1px] border-black"></td>
                    </tr>
                    <tr>
                        <td><label for="description">Deskripsi</label></td>
                        {{-- <td><input type="text" name="description" id="description" class="w-full border-b-[1px] border-black"></td> --}}
            <td><textarea 
            name="description" 
            id="description" 
            rows="4"
            class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
            placeholder="Masukkan deskripsi"
        ></textarea></td>
                    </tr>
                </table>
            </form>
        </section>
    </body>
</html>