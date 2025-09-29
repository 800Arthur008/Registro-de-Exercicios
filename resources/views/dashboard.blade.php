<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Painel</h2>
            <a href="{{ url('/exercises/create') }}" class="px-4 py-2 bg-[#F53003] text-white rounded-sm">Criar exercício</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 text-sm text-green-600">{{ session('success') }}</div>
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
                <div class="p-4 bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Total de exercícios</div>
                    <div class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">{{ $totalExercises ?? 0 }}</div>
                </div>

                <div class="p-4 bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Tempo total (estimado)</div>
                    @php
                        $hours = intdiv($totalMinutes ?? 0, 60);
                        $minutes = ($totalMinutes ?? 0) % 60;
                    @endphp
                    <div class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">{{ $hours }}h {{ $minutes }}m</div>
                </div>

                <div class="p-4 bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Calorias estimadas</div>
                    <div class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">{{ number_format($totalCalories ?? 0, 0, ',', '.') }} kcal</div>
                </div>
            </div>

            <div class="bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm overflow-hidden">
                <div class="p-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-between">
                    <h3 class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Exercícios recentes</h3>
                    <a href="{{ url('/exercises') }}" class="text-[13px] text-[#706f6c] dark:text-[#A1A09A] underline">Ver todos</a>
                </div>

                <!-- Formulário de busca -->
                <form method="GET" action="{{ route('dashboard') }}" class="p-4 flex flex-col md:flex-row gap-2 md:items-end border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div>
                        <label for="name" class="block text-xs text-[#706f6c] dark:text-[#A1A09A]">Atividade</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $filterName) }}" class="border border-[#e3e3e0] dark:border-[#3E3E3A] rounded px-2 py-1 bg-white dark:bg-[#232320] text-[#1b1b18] dark:text-[#EDEDEC]" placeholder="Buscar por nome">
                    </div>
                    <div>
                        <label for="date" class="block text-xs text-[#706f6c] dark:text-[#A1A09A]">Data do exercício</label>
                        <input type="date" name="date" id="date" value="{{ old('date', $filterDate ?? null) }}" class="border border-[#e3e3e0] dark:border-[#3E3E3A] rounded px-2 py-1 bg-white dark:bg-[#232320] text-[#1b1b18] dark:text-[#EDEDEC]">
                    </div>
                    <div>
                        <button type="submit" class="px-4 py-2 bg-[#F53003] text-white rounded-sm mt-4 md:mt-0">Buscar</button>
                    </div>
                </form>

                <div class="p-4">
                    @if($exercises->isEmpty())
                        <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Nenhum exercício registrado ainda.</div>
                    @else
                        <table class="w-full text-left text-[13px] text-[#1b1b18] dark:text-[#EDEDEC]">
                            <thead>
                                <tr class="text-[#706f6c] dark:text-[#A1A09A]">
                                    <th class="pb-2">Data</th>
                                    <th class="pb-2">Atividade</th>
                                    <th class="pb-2">Duração</th>
                                    <th class="pb-2">Calorias</th>
                                    <th class="pb-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exercises as $exercise)
                                    <tr class="border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                                        <td class="py-3">{{ $exercise->date->format('d/m/Y') }}</td>
                                        <td class="py-3">{{ $exercise->name }}</td>
                                        <td class="py-3">{{ $exercise->duration_minutes }}m</td>
                                        <td class="py-3">{{ $exercise->calories }} kcal</td>
                                        <td class="py-3">
                                            <a href="{{ route('exercises.edit', $exercise) }}" class="text-[#F53003]">Editar</a>
                                            •
                                            <form action="{{ route('exercises.destroy', $exercise) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-[#706f6c] dark:text-[#A1A09A]">Remover</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>       
    </div>
    @include('layouts.footer')
</x-app-layout>
