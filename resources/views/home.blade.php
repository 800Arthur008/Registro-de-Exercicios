<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        @endif
    </head>
</body>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] p-6 lg:p-8 min-h-screen">
        <div class="max-w-6xl mx-auto">
            <header class="flex items-center justify-between mb-8">
                <a href="/" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-sm bg-[#F53003] dark:bg-[#FF4433] flex items-center justify-center text-white font-semibold">RE</div>
                    <div class="text-lg font-medium">Registro de Exercícios</div>
                </a>

                @if (Route::has('login'))
                    <nav class="flex items-center gap-3 text-sm">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-[#1b1b18] text-white rounded-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 border border-transparent hover:border-[#19140035] rounded-sm">Entrar</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-[#F53003] text-white rounded-sm">Cadastrar</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <!-- Hero -->
            <section class="bg-white dark:bg-[#161615] rounded-lg p-8 shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] mb-8">
                <div class="lg:flex lg:items-center lg:gap-10">
                    <div class="lg:flex-1">
                        <h1 class="text-3xl lg:text-4xl font-semibold mb-4">Crie e gerencie listas de exercícios rapidamente</h1>
                        <p class="text-[13px] leading-[20px] text-[#706f6c] dark:text-[#A1A09A] mb-6">Monte treinos personalizados, compartilhe com amigos e acompanhe a evolução. Ideal para professores, personal trainers e entusiastas.</p>

                        <div class="flex gap-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-5 py-2 bg-[#F53003] text-white rounded-sm">Minha Dashboard</a>
                                <a href="{{ url('/exercises/create') }}" class="px-5 py-2 border border-[#19140035] rounded-sm">Criar Lista</a>
                            @else
                                <a href="{{ route('register') }}" class="px-5 py-2 bg-[#F53003] text-white rounded-sm">Começar (Gratuito)</a>
                                <a href="{{ route('login') }}" class="px-5 py-2 border border-transparent hover:border-[#19140035] rounded-sm">Entrar</a>
                            @endauth
                        </div>
                    </div>

                    <div class="mt-6 lg:mt-0 lg:w-[438px]">
                        <div class="bg-[url('/build/assets/exercise-card-placeholder.jpg')] bg-cover bg-center rounded-lg p-4 shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)]">
                            <div class="bg-white/90 dark:bg-[#0a0a0a]/80 p-4 rounded-sm">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="font-medium">Treino A — Força</div>
                                    <div class="text-[13px] text-[#706f6c] dark:text-[#A1A09A]">30 min</div>
                                </div>

                                <ul class="text-[13px] text-[#1b1b18] dark:text-[#EDEDEC] leading-normal">
                                    <li class="mb-2">1. Agachamento — 3x12</li>
                                    <li class="mb-2">2. Supino — 3x10</li>
                                    <li class="mb-2">3. Remada — 3x10</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features -->
            <section class="grid lg:grid-cols-3 gap-4 mb-8">
                <div class="bg-white dark:bg-[#161615] p-6 rounded-lg border border-[#e3e3e0]">
                    <h3 class="font-medium mb-2">Organize treinos</h3>
                    <p class="text-[13px] text-[#706f6c] dark:text-[#A1A09A]">Crie várias listas, agrupe por objetivo, e acesse rapidamente na hora do treino.</p>
                </div>

                <div class="bg-white dark:bg-[#161615] p-6 rounded-lg border border-[#e3e3e0]">
                    <h3 class="font-medium mb-2">Compartilhe</h3>
                    <p class="text-[13px] text-[#706f6c] dark:text-[#A1A09A]">Compartilhe suas listas com alunos ou parceiros através de links públicos.</p>
                </div>

                <div class="bg-white dark:bg-[#161615] p-6 rounded-lg border border-[#e3e3e0]">
                    <h3 class="font-medium mb-2">Acompanhe progresso</h3>
                    <p class="text-[13px] text-[#706f6c] dark:text-[#A1A09A]">Registre cargas, repetições e notas para ver a evolução ao longo do tempo.</p>
                </div>
            </section>

            <!-- CTA strip -->
            <section class="bg-[#1b1b18] text-white rounded-lg p-6 flex items-center justify-between">
                <div>
                    <div class="font-semibold">Pronto para começar?</div>
                    <div class="text-[13px] text-white/80">Crie sua primeira lista de exercícios em menos de 1 minuto.</div>
                </div>
                <div>
                    @auth
                        <a href="{{ url('/exercises/create') }}" class="px-4 py-2 bg-[#FDFDFC] text-[#1b1b18] rounded-sm">Criar nova lista</a>
                    @else
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-[#FDFDFC] text-[#1b1b18] rounded-sm">Registrar-se</a>
                    @endauth
                </div>
            </section>

            @include('layouts.footer')
        </div>
    </body>
</html>
