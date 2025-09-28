<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Meus Exercícios</h2>
            <a href="{{ route('exercises.create') }}" class="px-4 py-2 bg-[#F53003] text-white rounded-sm">Novo exercício</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm overflow-hidden">
                <div class="p-4">
                    @if(session('success'))
                        <div class="mb-4 text-sm text-green-600">{{ session('success') }}</div>
                    @endif

                    @if($exercises->isEmpty())
                        <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Nenhum exercício registrado.</div>
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

                        <div class="mt-4">
                            {{ $exercises->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
