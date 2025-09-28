<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Painel</h2>
            <a href="{{ url('/exercises/create') }}" class="px-4 py-2 bg-[#F53003] text-white rounded-sm">Criar exercício</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
                <div class="p-4 bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Total de exercícios</div>
                    <div class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">42</div>
                </div>

                <div class="p-4 bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Tempo total (estimado)</div>
                    <div class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">12h 30m</div>
                </div>

                <div class="p-4 bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Calorias estimadas</div>
                    <div class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">9.800 kcal</div>
                </div>
            </div>

            <div class="bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm overflow-hidden">
                <div class="p-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-between">
                    <h3 class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Exercícios recentes</h3>
                    <a href="{{ url('/exercises') }}" class="text-[13px] text-[#706f6c] dark:text-[#A1A09A] underline">Ver todos</a>
                </div>

                <div class="p-4">
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
                            <tr class="border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                                <td class="py-3">2025-09-27</td>
                                <td class="py-3">Corrida</td>
                                <td class="py-3">30m</td>
                                <td class="py-3">300 kcal</td>
                                <td class="py-3"><a href="#" class="text-[#F53003]">Editar</a> • <a href="#" class="text-[#706f6c] dark:text-[#A1A09A]">Remover</a></td>
                            </tr>
                            <tr class="border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                                <td class="py-3">2025-09-26</td>
                                <td class="py-3">Treino de Força</td>
                                <td class="py-3">45m</td>
                                <td class="py-3">450 kcal</td>
                                <td class="py-3"><a href="#" class="text-[#F53003]">Editar</a> • <a href="#" class="text-[#706f6c] dark:text-[#A1A09A]">Remover</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>       
    </div>
    @include('layouts.footer')
</x-app-layout>
