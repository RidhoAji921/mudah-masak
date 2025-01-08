<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Mudah Masak</title>
    </head>
    <body class="overflow-x-hidden">
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
                <div class="absolute flex items-center justify-center inset-0 bg-vignette pointer-events-none">
                    <p class="text-5xl font-extrabold text-white">Karena Masak Itu Mudah</p>
                </div>
            </div>
        </section>
    </body>
</html>
