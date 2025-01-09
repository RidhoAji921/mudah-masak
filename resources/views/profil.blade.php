<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>{{ auth()->user()->name }}</title>
    </head>
    <body class="overflow-x-hidden">
        @include("layouts.header")
        
    </body>
</html>