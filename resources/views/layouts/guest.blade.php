<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC]">
        <div class="min-h-screen flex items-center justify-center px-4 py-12">
            <div class="w-full max-w-md">
                <header class="mb-6 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mx-auto rounded-md bg-[#F53003] dark:bg-[#FF4433] text-white font-bold">RE</div>
                    <h1 class="mt-4 text-2xl font-semibold">{{ config('app.name', 'Registro de Exercícios') }}</h1>
                    <p class="mt-1 text-[13px] text-[#706f6c] dark:text-[#A1A09A]">Acesse sua conta para gerenciar suas atividades físicas</p>
                </header>

                <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg shadow-lg overflow-hidden p-6">
                    {{ $slot }}
                </div>

                <footer class="mt-6 text-center text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    <a href="/" class="underline hover:text-[#1b1b18] dark:hover:text-white">Voltar para a página inicial</a>
                </footer>
            </div>
        </div>
    </body>
</html>
